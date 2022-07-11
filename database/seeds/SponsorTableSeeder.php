<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Sponsor;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++){
            $newSponsor = new Sponsor();
            $newSponsor->name = $faker->words(5, true);
            $newSponsor->price = rand(10, 100);

            $newSponsor->save();
        }
    }
}
