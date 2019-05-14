<?php

namespace App\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Competidor extends Model
{
    protected $connection = 'gerencia';

    protected $table = 'competidor';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fk_empresa',
        'fk_criterio',
        'fk_escala',
    ];
    
    
    public function relacionTipo() 
    {
         return $this->hasOne(Criterio::class, 'id', 'fk_criterio');
     }
     
    public function relacionEscala() 
    {
         return $this->hasOne(Escalacriterio::class, 'id', 'fk_escala');
     }
     
    public function relacionEmpresa() 
    {
         return $this->hasOne(Empresas::class, 'id', 'fk_empresa');
     }
}