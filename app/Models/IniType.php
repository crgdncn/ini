<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniSection;

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
     * short hand to get sections
     * @return Collection
     */
    public function getSectionsAttribute()
    {
        return $this->iniSections;
    }
}
