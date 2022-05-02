<?php

namespace Pinetco\TranslationManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pinetco\TranslationManager\Translator;

class Translation extends Model
{
    use HasFactory;

    protected $table = 'pltm_translations';

    protected $guarded = [];

    protected $dates = [
        'processed_at',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function views()
    {
        return $this->hasManyThrough(View::class, Route::class, 'id', 'route_id', 'route_id', 'id');
    }

    public function scopeProcessed($query)
    {
        return $query->whereNotNull('processed_at');
    }

    public function scopeNotProcessed($query)
    {
        return $query->whereNull('processed_at');
    }

    public function shouldAddNewKey()
    {
        return ! ! $this->key;
    }

    public function process()
    {
        (new Translator($this))->process();
    }

    public function processed()
    {
        $this->processed_at = now();
        $this->save();
    }
}
