<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class makeusers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name='admin user';

        $admin->email='admin@admin.com';
        $admin->password=Hash::make('123456');
        $admin->user_type='admin';
        $admin->save();

        $admin = new User();
        $admin->name='normal user';
        $admin->email='user@gmail.com';
        $admin->password=Hash::make('123456');
        $admin->user_type='user';
        $admin->save();
    }
}
