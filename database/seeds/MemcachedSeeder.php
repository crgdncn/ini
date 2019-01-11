<?php

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\FileSection;
use App\Models\FileSectionKey;
use App\Models\IniKey;
use App\Models\IniSection;
use App\Models\IniType;

class MemcachedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * =============== Definition ===============
         */
        $data = [
            'name' => 'PHP Ext Memcached',
            'description' => ' Enable or disable memcached',
        ];

        $iniType = IniType::create($data);

        $data = [
            'name' => 'memcached',
            'description' => 'Enable or disable memcached',
            'ini_type_id' => $iniType->id,
        ];

        $iniSection = IniSection::create($data);

        $keyData = $this->getKeyData();

        $iniKeys = [];
        foreach ($keyData as $data) {
            $data['ini_section_id'] = $iniSection->id;
            $iniKeys[] = IniKey::create($data);
        }

        /*
         * =============== File ===============
         */

        $data = [
            'ini_type_id' => $iniType->id,
            'file_name' => 'ext-memcached.ini',
        ];
        $file = File::create($data);

        $data = [
            'file_id' => $file->id,
            'ini_section_id' => $iniSection->id,
        ];
        $fileSection = FileSection::create($data);

        /*
         * =============== Values ===============
         */

        $sectionKeyValues = $this->getValues();

        foreach ($sectionKeyValues as $key => $value) {
            $data = [
                'file_section_id' => $fileSection->id,
                'ini_key_id' => $iniKeys[$key]->id,
                'value' => $value,
            ];
            FileSectionKey::create($data);
        }
    }

    protected function getKeyData()
    {
        return [
            0 => [
                'name' => 'extension',
                'description' => 'The path to the extension library file.',
            ],
            1 => [
                'name' => 'memcached.sess_locking',
                'description' => 'Use session locking valid values: On, Off the default is On',
            ],
            2 => [
                'name' => 'memcached.sess_lock_wait_min',
                'description' => ' Session spin lock retry wait time in microseconds.',
            ],
            3 => [
                'name' => 'memcached.sess_lock_max_wait_min',
                'description' => ' The maximum time, in seconds, to wait for a session lock',
            ],
            4 => [
                'name' => 'memcached.sess_lock_expire',
                'description' => 'The time, in seconds, before a lock should release itself.',
            ],
            5 => [
                'name' => 'memcached.sess_prefix',
                'description' => 'memcached session key prefix',
            ],
            6 => [
                'name' => 'memcached.sess_consistent_hash',
                'description' => 'memcached session consistent hash mode',
            ],
            7 => [
                'name' => 'memcached.sess_remove_failed',
                'description' => 'Allow failed memcached server to automatically be removed',
            ],
            8 => [
                'name' => 'memcached.sess_number_of_replicas',
                'description' => 'Write data to a number of additional memcached servers',
            ],
            9 => [
                'name' => 'memcached.sess_binary',
                'description' => 'memcached session binary mode',
            ],
            10 => [
                'name' => 'memcached.sess_randomize_replica_read',
                'description' => 'memcached session replica read randomize',
            ],
            11 => [
                'name' => 'memcached.sess_connect_timeout',
                'description' => 'memcached connect timeout value during socket connection in milliseconds. Specifying -1 means an infinite timeout.',
            ],
            12 => [
                'name' => 'memcached.sess_sasl_username',
                'description' => 'Session SASL username',
            ],
            13 => [
                'name' => 'memcached.sess_sasl_password',
                'description' => 'Session SASL password',
            ],
            14 => [
                'name' => 'memcached.compression_type',
                'description' => 'Set the compression type valid values are: fastlz, zlib the default is fastlz',
            ],
            15 => [
                'name' => 'memcached.compression_factor',
                'description' => 'Compression factor. The default value is 1.3 (23% space saving)',
            ],
            16 => [
                'name' => 'memcached.compression_threshold',
                'description' => 'The compression threshold - default is 2000 bytes',
            ],
            17 => [
                'name' => 'memcached.serializer',
                'description' => 'Set the default serializer for new memcached objects. valid values are: php, igbinary, json, json_array, msgpack. The default is igbinary if available, then msgpack if available, then php otherwise.',
            ],
            18 => [
                'name' => 'memcached.use_sasl',
                'description' => 'Use SASL authentication for connections',
            ],
            19 => [
                'name' => 'memcached.store_retry_count',
                'description' => 'The amount of retries for failed store commands.',
            ],
        ];
    }

    protected function getValues()
    {
        return [
            0 => '/usr/local/opt/php/memcached.so',
            1 => 'On',
            2 => '150000',
            // 3 => '0',
            // 4 => '0',
            5 => '"memc.sess.key."',
            6 => 'Off',
            7 => '1',
            8 => '0',
            9 => 'Off',
            10 => 'Off',
            11 => '1000',
            // 12 => 'NULL',
            // 13 => 'NULL',
            // 14 => '"fastlz"',
            // 15 => '1.3',
            // 16 => '2000',
            // 17 => 'igbinary',
            // 18 => 'Off',
            19 => '2',
        ];
    }
}
