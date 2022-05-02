<?php

namespace Pinetco\TranslationManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'pltm_routes';

    protected $guarded = [];

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function translations()
    {
        return $this->hasMany(Translation::class);
    }
}
