<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\FileSectionKey;
use App\Models\FileSection;
use App\Models\IniKey;

class FileSectionKey extends Model
{
    protected $fillable = [
        'file_section_id',
        'ini_key_id',
        'value'
    ];

    public function fileSection()
    {
        return $this->belongsTo(FileSection::class);
    }

    public function iniKey()
    {
        return $this->belongsTo(IniKey::class);
    }

    public function getNameAttribute()
    {
        return $this->iniKey->name;
    }

    /**
     * find all key value pairs for the provided section
     *
     * @param  FileSection $section
     * @param  IniKey      $iniKey
     * @return Collection
     */
    public static function findSectionKeyValue(FileSection $section, IniKey $iniKey)
    {
        return FileSectionKey::where('file_section_id', '=', $section->id)
            ->where('ini_key_id', '=', $iniKey->id)
            -get();
    }
}
