<?php

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\FileSection;
use App\Models\FileSectionKey;
use App\Models\IniKey;
use App\Models\IniSection;
use App\Models\IniType;

class XdebugSeeder extends Seeder
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
            'name' => 'PHP Ext Xdebug',
            'description' => 'Load xdebug Library',
        ];

        $iniType = IniType::create($data);

        $data = [
            'name' => 'xdebug',
            'description' => 'Enable or disable xdebug',
            'ini_type_id' => $iniType->id,
        ];

        $iniSection = IniSection::create($data);

        $keyData = [
            0 => [
                'name' => 'extension',
                'description' => 'The path to the extension library file.',
                'ini_section_id' => $iniSection->id,
            ],
        ];

        $iniKeys = [];
        foreach ($keyData as $data) {
            $iniKeys[] = IniKey::create($data);
        }

        /*
         * =============== File ===============
         */

        $data = [
            'ini_type_id' => $iniType->id,
            'file_name' => 'ext-xdebug.ini',
        ];

        $file = File::create($data);

        $data = [
            'file_id' => $file->id,
            'ini_section_id' => $iniSection->id,
        ];

        $fileSection = FileSection::create($data);

        $sectionKeyData = [
            0 => [
                'file_section_id' => $fileSection->id,
                'ini_key_id' => $iniKeys[0]->id,
                'value' => '/usr/local/opt/php/xdebug.so"',
            ],
        ];

        foreach ($sectionKeyData as $data) {
            FileSectionKey::create($data);
        }
    }
}
