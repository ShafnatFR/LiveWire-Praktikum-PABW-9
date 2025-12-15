<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'nim' => $this->faker()->unique()->numerify('607012######'),
            'nama' => $this->faker()->name(),
            'prodi' => $this->faker()->randomElement(['D3 Sistem Informasi', 'S1 Teknik Industri', 'S1 Administrasi Negara']),
            'sks' => $this->faker()->numberBetween(10, 144),
            'status' => $this->faker()->randomElement(['aktif', 'cuti', 'lulus', 'drop out']),
            'kategori' => $this->faker()->randomElement(['reguler', 'internasional']),
        ];
    }
}
