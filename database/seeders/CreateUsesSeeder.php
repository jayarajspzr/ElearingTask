<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsesSeeder extends Seeder
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
               'name'=>'jai',
               'email'=>'jai@gmail.com',
                'access_identify'=>'1',
               'password'=> bcrypt('jaiabcd'),
            ],
            [
               'name'=>'raj',
               'email'=>'raj@gmail.com',
                'access_identify'=>'0',
               'password'=> bcrypt('rajabcd'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
