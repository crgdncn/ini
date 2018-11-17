<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniType;
use App\Models\IniKey;

class IniSection extends Model
{

    /**
     * All sections belong to a single ini file type
     *
     * @return IniType
     */
    public function type()
    {
        return $this->belongsTo(IniType::class);
    }

    /**
     * Ini File Sections have one or more keys
     *
     * @return Collection
     */
    public function keys()
    {
        return $this->hasMany(IniKey::class);
    }
}
