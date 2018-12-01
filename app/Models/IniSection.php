<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniType;
use App\Models\IniKey;

class IniSection extends Model
{
    protected $fillable = [
        'ini_type_id',
        'name',
        'description',
    ];

    /**
     * All sections belong to a single ini file type
     *
     * @return App\Models\IniType
     */
    public function iniType()
    {
        return $this->belongsTo(IniType::class);
    }

    /**
     * Ini File Sections have one or more keys
     *
     * @return Collection
     */
    public function iniKeys()
    {
        return $this->hasMany(IniKey::class);
    }

    /**
     * short hand for iniType
     * @return App\Models\IniType
     */
    public function getTypeAttribute()
    {
        return $this->iniType;
    }

    /**
     * short hand to get section keys
     * @return Collection
     */
    public function getKeysAttribute()
    {
        return $this->iniKeys;
    }
}
