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

    protected $extends = [
        'name',
        'description',
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
     * find the file section key value using the IniKey
     * @param  IniKey $iniKey
     * @return string
     */
    public function findKeyValue(IniKey $iniKey)
    {
        $this->fileSectionKeys()
            ->where('ini_key_id', '=', $iniKey->id)
            ->first()
            ->value
            ?? null;
    }

    /**
     * a collection of unused ini keys
     * @return Collection
     */
    public function availableIniKeys()
    {
        return IniKey::select(['ini_keys.*'])
            ->where('ini_section_id', '=', $this->iniSection->id)
            ->whereNotIn('id', function ($query) {
                $query->select('file_section_keys.ini_key_id')
                    ->from('file_section_keys')
                    ->where('file_section_id', '=', $this->id);
            })
            ->orderBy('ini_keys.name')
            ->get();
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

    /**
     * shortcut to ini section description
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->iniSection->description;
    }
}
