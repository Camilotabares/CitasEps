<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities=[
            'Cardiologia',
            'Dermatologia',
            'endocrinologia',
            'gastroenterologia',
            'geriatria',
            'ginecologia',
            'hematologia',
            'infectologia',
        ];
        foreach($specialities as $speciality){
            \App\Models\Speciality::create([
                'name'=>$speciality
            ]);
        }
    }
}
