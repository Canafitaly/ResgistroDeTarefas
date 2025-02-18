<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    private $categoria=['Trabalho','Pessoal','Robies','Afazeres'];

    public function getCategoria(){
        return $this->categoria;
    }

    public function getCategoriaPorId($id){
        return $this->categoria[$id];
    }

    protected $fillable = [
        'id',
        'categoria',
    ];
    public function tarefas() {
        return $this->hasMany(Tarefas::class);
    }
}