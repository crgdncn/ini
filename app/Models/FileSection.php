<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\IniSection;
use App\Models\FileSectionKey

class FileSection extends Model
{
    protected $fillable = [
        'file_id',
        'ini_section_id',
    ];

    public function iniSection()
    {
        return $this->belongsTo(IniSection::class);
    }

    public function fileSection()
    {
        return $this->hasMany(FileSectionKey::class);
    }
}
