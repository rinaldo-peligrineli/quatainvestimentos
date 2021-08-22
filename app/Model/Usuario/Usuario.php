<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome_usuario', 'email', 'senha', 'idade', 'nivel_acesso_id', 'observacoes',
        'status', 'saldo'];

    public function nivelAcesso() {
        return $this->belongsTo('App\Model\Usuario\NivelAcesso');
     } 
}
