<?php

namespace Pinetco\TranslationManager\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pinetco\TranslationManager\TranslationManager
 */
class TranslationManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'translation-manager';
    }
}
