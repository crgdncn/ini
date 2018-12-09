<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\File;
use App\Models\FileSectionKey;
use App\Models\IniSection;

class FileSection extends Model
{
    protected $fillable = [
        'file_id',
        'ini_section_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function fileSectionKeys()
    {
        return $this->hasMany(FileSectionKey::class);
    }

    public function iniSection()
    {
        return $this->belongsTo(IniSection::class);
    }

    /**
     * shortcut for file section keys
     * @return Collection
     */
    public function getKeysAttribute()
    {
        return $this->fileSectionKeys;
    }

    /**
     * the number of keys associated with this section
     * @return integer
     */
    public function getKeyCountAttribute()
    {
        return $this->keys->count();
    }

    /**
     * short cut to ini section name
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->iniSection->name;
    }
}
