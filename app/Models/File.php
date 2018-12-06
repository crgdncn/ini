<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\IniType;
use App\Models\FileSection;

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

    public function fileSection()
    {
        return $this->hasMany(FileSection::class);
    }
}
