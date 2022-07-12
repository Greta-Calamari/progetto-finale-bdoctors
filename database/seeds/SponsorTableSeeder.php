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
    public function run()
    {
        $sponsor = config('sponsor');
        foreach($sponsor as $item){
            $newSponsor = new Sponsor();
            $newSponsor->name = $item['name'];
            $newSponsor->price = $item['price'];
            $newSponsor->duration_in_hours = $item['duration_in_hours'];
            $newSponsor->save();
        }
    }
}
