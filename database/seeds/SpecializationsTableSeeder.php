<?php

use Illuminate\Database\Seeder;
use App\Specialization;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = config('specializations');
        foreach ($specializations as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization['specialization'];
            $newSpecialization->save();
        }
    }
}
