<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aldo',
        	'email' => 'admin@gmail.com',
        	'roles' => 'master',
        	'password' => bcrypt('asd123'),
        ]);
    }
}
