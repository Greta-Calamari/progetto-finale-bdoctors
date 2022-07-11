<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<20; $i++){
        
            $newReview = new Review();
            $newReview->name= $faker->name($gender = null);
            $newReview->comment= $faker->paragraph(10,true);
            $newReview->votes = $faker->numberBetween(1,5);
            $newReview->doctor_id = $faker->numberBetween(1,10);
            $newReview->save();
        }
    }
}
