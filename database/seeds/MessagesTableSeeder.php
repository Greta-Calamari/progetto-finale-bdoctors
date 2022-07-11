<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++){
            $newMessage = new Message();
            $newMessage->doctor_id = $faker->numberBetween(1, 10);
            $newMessage->content = $faker->text();
            $newMessage->email = $faker->email();
            $newMessage->name = $faker->name($gender = null);
            $newMessage->save();
        }
    }
}
