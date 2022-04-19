<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;
use App\Models\Patient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Patient::create([
            'name' => 'Joko Amanto',
            'gender' => 'Pria',
            'age' => 19
        ]);
        Record::create([
            'patient_id' => 1,
            'temperature' => 37.2,
            'condition' => 'aduh sakit banget ini sedih :(('
        ]);

        Record::create([
            'patient_id' => 1,
            'temperature' => 17,
            'condition' => 'aduhh sekarat'
        ]);
    }
}
