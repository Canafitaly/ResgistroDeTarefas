<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Prioridade extends Model
{
    protected $table = '_prioridade';
    

    protected $fillable = [
        'id',
        'prioridade',
    ];
    public function tarefas() {
        return $this->hasMany(Tarefas::class);
    }   
}