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

    /**
     * Shortcut method
     * @return App\Models\IniSection
     */
    public function getSectionAttribute()
    {
        return $this->IniSection;
    }

    /**
     * Shortcut method
     * @return App\Model\IniType
     */
    public function getTypeAttribute()
    {
        return $this->section->type;
    }

    /**
     * find all keys belonging to a section.
     *
     * @param  App\Models\IniSection | integer $section Use either the model or the id of the model.
     * @return Collection
     */
    public static function findBySection($section)
    {
        if (is_integer($section)) {
            $sectionId = $section;
        }

        if (is_object($section) && get_class($section) == IniSection::class) {
            $sectionId = $section->id;
        }

        if (!is_integer($sectionId)) {
            return null;
        }

        return IniKey::where('ini_section_id', '=', $sectionId)->get();
    }
}
