<?php

namespace App\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Empresas extends Model
{
    protected $connection = 'gerencia';

    protected $table = 'empresas';

    protected $primaryKey = 'id';

    protected $fillable = [
       
        'name'
         ];
    
}