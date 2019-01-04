<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniType;
use App\Models\IniKey;
use App\Models\FileSection;

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
     * Files sections are defined by IniSection
     * @return [type] [description]
     */
    public function fileSections()
    {
        return $this->hasMany(FileSection::class);
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

    /**
     * find all sections by type
     * @param  App\Models\IniType | integer $type
     * @return Collection
     */
    public static function findByType($type)
    {
        if (is_integer($type)) {
            $typeId = $type;
        }

        if (is_object() && get_class($type) == IniType::class) {
            $typeId = $type->id;
        }

        if (!is_integer($typeId)) {
            return null;
        }

        return IniSection::where('ini_type_id', '=', $typeId)->get();
    }
}
