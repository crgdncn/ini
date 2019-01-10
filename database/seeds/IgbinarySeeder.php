<?php

use Illuminate\Database\Seeder;
use App\Models\File;
use App\Models\FileSection;
use App\Models\FileSectionKey;
use App\Models\IniKey;
use App\Models\IniSection;
use App\Models\IniType;

class IgbinarySeeder extends Seeder
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
            'name' => 'PHP Ext Igbinary',
            'description' => ' Enable or disable compacting of duplicate strings',
        ];

        $iniType = IniType::create($data);

        $data = [
            'name' => 'igbinary',
            'description' => 'Enable or disable compacting of duplicate strings',
            'ini_type_id' => $iniType->id,
        ];

        $iniSection = IniSection::create($data);

        $keyData = [
            0 => [
                'name' => 'extension',
                'description' => 'The path to the extension library file.',
                'ini_section_id' => $iniSection->id,
            ],
            1 => [
                'name' => 'igbinary.compact_strings',
                'description' => 'The default is On.',
                'ini_section_id' => $iniSection->id,
            ],
            2 => [
                'name' => 'session.serialize_handler',
                'description' => 'Use igbinary as session serializer.',
                'ini_section_id' => $iniSection->id,
            ],
            3 => [
                'name' => 'apc.serializer',
                'description' => 'Use igbinary as APC serializer.',
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
            'file_name' => 'ext-igbinary.ini',
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
                'value' => '/usr/local/opt/php/mcrypt.so"',
            ],
            1 => [
                'file_section_id' => $fileSection->id,
                'ini_key_id' => $iniKeys[1]->id,
                'value' => 'On',
            ],
            2 => [
                'file_section_id' => $fileSection->id,
                'ini_key_id' => $iniKeys[2]->id,
                'value' => 'igbinary',
            ],
            3 => [
                'file_section_id' => $fileSection->id,
                'ini_key_id' => $iniKeys[3]->id,
                'value' => 'igbinary',
            ],
        ];

        foreach ($sectionKeyData as $data) {
            FileSectionKey::create($data);
        }
    }
}
