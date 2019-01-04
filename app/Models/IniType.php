<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniSection;
use App\Models\File;

class IniType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Ini File Types have one or more sections
     *
     * @return Collection
     */
    public function iniSections()
    {
        return $this->hasMany(IniSection::class);
    }

    /**
     * one or more files of this type
     * @return Collection
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }

    /**
     * short hand to get sections
     * @return Collection
     */
    public function getSectionsAttribute()
    {
        return $this->iniSections;
    }
}
