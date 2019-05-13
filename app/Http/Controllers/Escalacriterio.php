<?php

namespace App\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Escalacriterio extends Model
{
    protected $connection = 'gerencia';

    protected $table = 'escala_criterio';

    protected $primaryKey = 'id';

    protected $fillable = [
       
        'descripcion',
        'valor'
         ];
    
}