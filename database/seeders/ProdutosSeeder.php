<?php

namespace Database\Seeders;

use App\Models\Produtos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    public function run(): void
    {
       Produtos::create(   
        [
            'nome' => 'Pedro Carbonera', 
            'valor' => '20.99',
        ]
       );

    }
}
