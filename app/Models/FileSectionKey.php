<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
