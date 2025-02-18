<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->string('status');
            $table->string('data_limite');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('prioridade_id')->constrained('_prioridade');
            $table->foreignId('categoria_id')->constrained('_categoria');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('_tarefas');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
