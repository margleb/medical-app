<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Patient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем 10 врачей и каждому врачу добавляем по 5 пациентов
        Doctor::factory(10)->create()->each(function ($doctor) {
            Patient::factory(5)->create(['doctor_id' => $doctor->id]);
        });
    }
}
