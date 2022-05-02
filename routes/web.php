<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function() {
    Route::post('translation-manager/translations', [
        \Pinetco\TranslationManager\Controllers\TranslationController::class,
        'store'
    ])->name('translation-manager.translations.store');
});

