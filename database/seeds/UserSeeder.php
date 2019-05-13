<?php

use App\User;
use \Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    public function run(){
        User::insert([
            ['name'=>'Coordinador','email'=>'root@app.com','password'=> bcrypt('root')]
        ]);
    }
    
}