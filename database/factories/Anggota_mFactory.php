<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota_m>
 */
class Anggota_mFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->regexify('G\.\d{3}\.\d{2}\.\d{4}'),
            'nama' => $this->faker->name(),
            'progdi' => $this->faker->randomElement([
                'TI', 'SI', 'IK'
            ]),
        ];
    }
}