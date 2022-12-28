<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $admin['name'] = 'NguyenTX';
        $admin['email'] = 'admin@gmail.com';
        $admin['password'] = Hash::make('123456');
        $admin['role'] = Role::ADMIN;
        User::updateOrCreate($admin);
        //user
        $user['name'] = 'User 01';
        $user['email'] = 'user@gmail.com';
        $user['password'] = Hash::make('123456');
        $user['role'] = Role::USER;
        User::updateOrCreate($user);
//        //faker
//        User::factory(9)->create();
    }
}
