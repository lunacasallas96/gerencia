<?php

namespace App\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tipocriterio extends Model
{
    protected $connection = 'gerencia';

    protected $table = 'tipo_criterio';

    protected $primaryKey = 'id';

    protected $fillable = [
       
        'descripcion'
         ];
    
}