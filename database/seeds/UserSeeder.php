<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Alison',
                'lastname'=>'Vidal',
                'email'=>'cris@gmail.com',
                'password'=>bcrypt('cris1234'),
                'location'=>'Av Alemana 3er anillo',
                'created_at'=>Carbon::now()
            ],
            [
                'name'=>'Alison',
                'lastname'=>'Vidal',
                'email'=>'cris2@gmail.com',
                'password'=>bcrypt('cris1234'),
                'location'=>'Av Alemana 3er anillo',
                'created_at'=>Carbon::now()
            ]
        ]);
    }
}
