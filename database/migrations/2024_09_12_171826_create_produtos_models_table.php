<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');  //quando o campo nao for obrigatorio utilize o nullable()
            $table->float('valor');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
