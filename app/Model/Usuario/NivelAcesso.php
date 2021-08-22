<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class NivelAcesso extends Model
{
    protected $table = 'nivel_acesso';
    protected $fillable = [
        'nivel_acesso', 'status'
    ];
}    
