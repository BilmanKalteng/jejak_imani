<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Paket;
use App\Models\Maskapai;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    // Buat 10 user
        User::factory(10)->create()->each(function ($user) {
            // Buat 2 paket & 2 maskapai per user
            $pakets = Paket::factory(2)->create(['user_id' => $user->id]);
            $maskapais = Maskapai::factory(2)->create(['user_id' => $user->id]);

            // Buat 3 booking per user
            for ($i = 0; $i < 3; $i++) {
                Book::create([
                    'customer_nama' => fake()->name,
                    'tanggal_berangkat' => now()->addDays(rand(1, 30)),
                    'paket_id' => $pakets->random()->id,
                    'maskapai_id' => $maskapais->random()->id,
                    'book_sheet' => rand(1, 5),
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
