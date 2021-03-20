<?php

use Illuminate\Database\Seeder;

//add this to all seeder file
use Illuminate\Support\Facades\DB;
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
        DB::table('tbl_user')->insert([
            'name'=>'dhruv Koladiya',
            'email'=>"dhryv@gmail.com",
            'password'=>Hash::make('1234')
        ]);
    }
}
