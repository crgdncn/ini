<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniSection;

class IniKey extends Model
{
    /**
     * All keys belong to a single ini section
     *
     * @return IniSection
     */
    public function section()
    {
        return $this->belongsTo(IniSection::class);
    }
}
