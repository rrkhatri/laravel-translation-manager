<?php

namespace Pinetco\TranslationManager\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Pinetco\TranslationManager\Models\Route;
use Pinetco\TranslationManager\Models\Translation;

class TranslationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'from' => ['required', 'string', 'max:255'],
            'to' => ['required', 'string', 'max:255'],
            'key' => ['nullable', 'string', 'max:255'],
        ]);

        $route = Route::firstOrCreate([
            'path' => $request->route_path,
        ]);

        $translation = new Translation($validated);
        $translation->user_id = $request->user()->id;
        $translation->route_id = $route->id;
        $translation->locale = 'de';
        $translation->save();

        session()->flash('translation.saved', 'Translation saved successfully.');

        return back();
    }
}
