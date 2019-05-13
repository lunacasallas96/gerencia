<?php

use App\Http\Controller\Empresas;
use \Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    public function run(){
        Empresas::insert([
            ['name'=>'AGROINSUMOS SAN MIGUEL S.A.S']
        ]);
    }
    
}