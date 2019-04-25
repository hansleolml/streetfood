<?php

use Illuminate\Database\Seeder;
use StreetFood\Role;
use StreetFood\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role_user = Role::where('name','user')->first();
       $role_admin = Role::where('name','admin')->first();

       $user = new User();
       $user->name = "User";
       $user->email= "User@gmail.com";
       $user->password=bcrypt('query');
    }
}
