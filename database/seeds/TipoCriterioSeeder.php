<?php

use App\Http\Controller\Tipocriterio;
use \Illuminate\Database\Seeder;
class TipoCriterioSeeder extends Seeder
{
    public function run(){
        Tipocriterio::insert([
            ['descripcion'=>'cuantitativo'],
            ['descripcion'=>'cualitativo']
            
        ]);
    }
    
}