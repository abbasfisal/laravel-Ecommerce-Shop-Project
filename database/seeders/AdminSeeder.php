<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name'=>'admin',
            'tel'=>'09356743672',
            'username' => 'adminadmin',
            'type' => User::admin_type,
            'valid' =>true,
            'password' => Hash::make('123456'),
        ]);
    }
}
