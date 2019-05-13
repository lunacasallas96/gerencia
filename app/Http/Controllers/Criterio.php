<?php

namespace App\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Criterio extends Model
{
    protected $connection = 'gerencia';

    protected $table = 'criterio';

    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion'
        ,'fk_id_tipo'
    ];
    
    public function relacionTipo() 
    {
         return $this->hasOne(Tipocriterio::class, 'id', 'fk_id_tipo');
     }
}