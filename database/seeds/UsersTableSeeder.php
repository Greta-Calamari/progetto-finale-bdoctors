<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('doctors');
        $newUser = new User();
        foreach($users as $user){
            $newUser->name =$user['name'];
            $newUser->email =$user['email'];
            $newUser->password =$user['password'];
            $newUser->save(); 

        }
    }
}


        



            

