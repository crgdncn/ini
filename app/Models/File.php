<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\IniType;
use App\Models\FileSection;
use App\Models\File;

class File extends Model
{
    protected $fillable = [
        'ini_type_id',
        'file_name',
    ];

    public function iniType()
    {
        return $this->belongsTo(IniType::class);
    }

    public function fileSections()
    {
        return $this->hasMany(FileSection::class);
    }

    /**
     * List of available ini sections that have
     * not already been assigned to this file
     * @return Collection
     */
    public function availableSections()
    {
        return IniSection::select(['ini_sections.*'])
            ->where('ini_type_id', '=', $this->type->id)
            ->whereNotIn('id', function ($query) {
                $query->select('ini_sections.id')
                ->from('ini_sections')
                ->join('file_sections', 'ini_sections.id', '=', 'file_sections.ini_section_id')
                ->where('file_sections.file_id', '=', $this->id);
            })
            ->orderBy('ini_sections.name')
            ->get();
    }

    /**
     * return a collection of sections with keys
     * @return Collection
     */
    public function exportableSections()
    {
        return FileSection::select(['file_sections.*'])
            ->where('file_sections.file_id', '=', $this->id)
            ->with('iniSection', 'fileSectionKeys', 'fileSectionKeys.iniKey')
            ->get();
    }

    /**
     * Return the number of files of a given ini type
     * @param  IniType $type
     * @return integer
     */
    public static function countByType(IniType $type)
    {
        return File::where('ini_type_id', '=', $type->id)->count();
    }

    /**
     * short cut to get file name
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->file_name;
    }

    /**
     * short cut for ini type
     * @return \App\Models\IniType
     */
    public function getTypeAttribute()
    {
        return $this->iniType;
    }

    /**
     * short cut for file_sections
     * @return Collection
     */
    public function getSectionsAttribute()
    {
        return $this->fileSections;
    }
}
