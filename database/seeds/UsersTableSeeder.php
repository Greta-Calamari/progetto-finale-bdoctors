<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        foreach($users as $user){
            $newUser = new User();
            $newUser->name =$user['name'];
            $newUser->email =$user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->save(); 

        }
    }
}


        



            

