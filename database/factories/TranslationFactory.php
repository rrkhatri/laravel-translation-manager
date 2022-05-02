<?php

namespace Pinetco\TranslationManager\Database\Factories;

use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Pinetco\TranslationManager\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'route_id' => Route::factory(),
            'locale' => 'tt',
            'key' => null,
            'from' => null,
            'to' => null,
            'processed_at' => null,
        ];
    }
}
