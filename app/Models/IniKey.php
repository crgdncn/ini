<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniSection;

class IniKey extends Model
{
    protected $fillable = [
        'ini_section_id',
        'name',
        'description',
    ];

    /**
     * All keys belong to a single ini section
     *
     * @return IniSection
     */
    public function iniSection()
    {
        return $this->belongsTo(IniSection::class);
    }

    public function getSectionAttribute()
    {
        return $this->IniSection;
    }

    public function getTypeAttribute()
    {
        return $this->IniSection->type;
    }
}
