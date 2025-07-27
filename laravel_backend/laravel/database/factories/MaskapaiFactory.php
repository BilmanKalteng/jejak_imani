<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maskapai>
 */
class MaskapaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_maskapai' => $this->faker->company . ' Airlines',
            'jumlah_sheet' => $this->faker->numberBetween(50, 200),
            'harga_tiket' => $this->faker->numberBetween(1000000, 5000000),
            'user_id' => \App\Models\User::factory(),
        ];
    }

}
