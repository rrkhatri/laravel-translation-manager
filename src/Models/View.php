<?php

namespace Pinetco\TranslationManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $table = 'pltm_views';

    protected $guarded = [];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
