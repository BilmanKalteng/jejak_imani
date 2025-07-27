<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paket>
 */
class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_paket' => 'Paket ' . $this->faker->word,
            'harga_paket' => $this->faker->numberBetween(100000, 1000000),
            'user_id' => \App\Models\User::factory(),
        ];
    }

}
