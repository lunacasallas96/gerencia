<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresasSeeder::class);
        $this->call(EscalaSeeder::class);
        $this->call(TipoCriterioSeeder::class);
        $this->call(UserSeeder::class);
    }
}
