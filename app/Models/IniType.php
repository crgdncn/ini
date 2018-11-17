<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IniSection;

class IniType extends Model
{
    /**
     * Ini File Types have one or more sections
     *
     * @return Collection
     */
    public function sections()
    {
        return $this->hasMany(IniSection::class);
    }
}
