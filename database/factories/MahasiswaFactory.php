<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kelas = ['TIF 22 CID', 'TIF 22 CNS'];
        return [
            'nama' => fake()->name(),
            'nim' => 22552011 . fake()->randomNumber(3, true),
            'kelas' => $kelas[rand(0, 1)]
        ];
    }
}
