<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    private $status=['Pendente','Concluída','Em andamento'];
    public function getStatus(){
        return $this->status;
    }
    public function getStatusPorId($id){
        return $this->status[$id];
    }
    
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
        'status',
        'data_limite',
        'user_id',
        'prioridade_id',
        'categoria_id',
    ];
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
    
    public function prioridade() {
        return $this->belongsTo(Prioridade::class);
    }
}