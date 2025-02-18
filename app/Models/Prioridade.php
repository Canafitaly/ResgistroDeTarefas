<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Prioridade extends Model
{
    private $prioridade=['Baixa','Média','Alta','Urgente'];

    public function getPrioridade(){
        return $this->prioridade;
    }

    public function getPrioridadePorId($id){
        return $this->prioridade[$id];
    }

    protected $fillable = [
        'id',
        'prioridade',
    ];
    public function tarefas() {
        return $this->hasMany(Tarefas::class);
    }   
}