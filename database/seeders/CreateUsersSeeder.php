<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@eclass.com',
               'c_email'=>'example@gmail.com',
               'password'=> bcrypt('123456'),
               'role_id'=>'1',
            ],
            [
               'name'=>'teacher',
               'email'=>'teacher@eclass.com',
               'c_email'=>'example1@gmail.com',
               'password'=> bcrypt('123456'),
               'role_id'=>'2',
            ],
            [
                'name'=>'student',
                'email'=>'student@eclass.com',
                'c_email'=>'example2@gmail.com',
                'password'=> bcrypt('123456'),
                'role_id'=>'3',
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
