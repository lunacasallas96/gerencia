<?php

use App\Http\Controller\Escalacriterio;
use \Illuminate\Database\Seeder;
class EscalaSeeder extends Seeder
{
    public function run(){
        Escalacriterio::insert([
            ['descripcion'=>'malo','valor'=>1],
            ['descripcion'=>'regular','valor'=>2],
            ['descripcion'=>'bueno','valor'=>3],
            ['descripcion'=>'sobresaliente','valor'=>4],
            ['descripcion'=>'excelente','valor'=>5]
        ]);
    }
    
}