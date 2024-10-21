<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
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
        return [
            'nim' => mt_rand(1000000000, 1999999999),
            'name' => fake()->name(),
            'gender' => Arr::random(['L', 'P']),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'prodi_id' => mt_rand(1,8)
        ];
    }
}
