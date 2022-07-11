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
        foreach($users as $user){
            $newUser = new User();
            $newUser->name =$user['name'];
            $newUser->email =$user['email'];
            $newUser->password =$user['password'];
            // 'password' => Hash::make($data['password']),
            $newUser->save(); 

        }
    }
}


        



            

