<?php

namespace Database\Seeders;

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
        $admin['email'] = 'nguyentx@gmail.com';
        $admin['password'] = Hash::make('123456');
        User::updateOrCreate($admin);
        //faker
        User::factory(9)->create();
    }
}
