<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = \App\Models\User::factory()->create();
        $paket = \App\Models\Paket::factory()->create(['user_id' => $user->id]);
        $maskapai = \App\Models\Maskapai::factory()->create(['user_id' => $user->id]);

        return [
            'customer_nama' => $this->faker->name,
            'tanggal_berangkat' => $this->faker->dateTimeBetween('now', '+2 months'),
            'paket_id' => $paket->id,
            'maskapai_id' => $maskapai->id,
            'book_sheet' => $this->faker->numberBetween(1, 5),
            'user_id' => $user->id,
        ];
    }
}
