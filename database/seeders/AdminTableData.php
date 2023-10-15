<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class AdminTableData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'ten'=>'vietthanh',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123123'),
            'quyen'=>1  
        ]);
    }
}
