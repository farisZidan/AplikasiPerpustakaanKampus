<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku-m>
 */
class Buku_mFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Kolom 'Judul' akan diisi dengan 3 kata acak
            'Judul' => $this->faker->sentence(3), 
            
            // Kolom 'Pengarang' akan diisi dengan nama orang acak
            'Pengarang' => $this->faker->name(), 

            // Kolom 'Kategori' akan diisi salah satu dari array ini
            'Kategori' => $this->faker->randomElement([
                'novel', 'komik', 'kamus', 'program', 'teori'
            ]),
        ];
    }
}
