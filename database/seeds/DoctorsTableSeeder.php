<?php

use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = config('doctors');

        foreach( $doctors as $doctor) {
            $newDoctor = new Doctor();
            $newDoctor->name = $doctor['name'];
            $newDoctor->surname = $doctor['surname'];
            $newDoctor->slug = Doctor::generateSlug($doctor['name'], $doctor['surname']);
            $newDoctor->address = $doctor['address'];
            //$newDoctor->photo = $doctor['photo'];
            //$newDoctor->curriculum_vitae = $doctor['curriculum_vitae'];
            $newDoctor->cell_number = $doctor['cell_number'];
            $newDoctor->services = $doctor['services'];
            $newDoctor->user_id = $doctor['user_id'];

            $newDoctor->save();

        }
        
    }
}
