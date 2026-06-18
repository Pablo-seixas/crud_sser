<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        Produto::insert([

            ['categoria_id'=>3,'nome'=>'Papel A4','codigo'=>'ESC001','quantidade'=>500,'estoque_minimo'=>100],
            ['categoria_id'=>3,'nome'=>'Caneta Azul','codigo'=>'ESC002','quantidade'=>200,'estoque_minimo'=>50],
            ['categoria_id'=>3,'nome'=>'Caneta Preta','codigo'=>'ESC003','quantidade'=>200,'estoque_minimo'=>50],
            ['categoria_id'=>3,'nome'=>'Lapis','codigo'=>'ESC004','quantidade'=>300,'estoque_minimo'=>50],
            ['categoria_id'=>3,'nome'=>'Borracha','codigo'=>'ESC005','quantidade'=>150,'estoque_minimo'=>20],
            ['categoria_id'=>3,'nome'=>'Caderno','codigo'=>'ESC006','quantidade'=>100,'estoque_minimo'=>20],

            ['categoria_id'=>2,'nome'=>'Computador','codigo'=>'TEC001','quantidade'=>20,'estoque_minimo'=>5],
            ['categoria_id'=>2,'nome'=>'Notebook','codigo'=>'TEC002','quantidade'=>15,'estoque_minimo'=>3],
            ['categoria_id'=>2,'nome'=>'Monitor','codigo'=>'TEC003','quantidade'=>25,'estoque_minimo'=>5],
            ['categoria_id'=>2,'nome'=>'Mouse','codigo'=>'TEC004','quantidade'=>80,'estoque_minimo'=>10],
            ['categoria_id'=>2,'nome'=>'Teclado','codigo'=>'TEC005','quantidade'=>60,'estoque_minimo'=>10],
            ['categoria_id'=>2,'nome'=>'Tela LCD','codigo'=>'TEC006','quantidade'=>12,'estoque_minimo'=>2],

            ['categoria_id'=>1,'nome'=>'agua Sanitria','codigo'=>'LIM001','quantidade'=>50,'estoque_minimo'=>10],
            ['categoria_id'=>1,'nome'=>'Detergente','codigo'=>'LIM002','quantidade'=>80,'estoque_minimo'=>10],
            ['categoria_id'=>1,'nome'=>'Sabao em Po','codigo'=>'LIM003','quantidade'=>60,'estoque_minimo'=>10],
            ['categoria_id'=>1,'nome'=>'Desinfetante','codigo'=>'LIM004','quantidade'=>70,'estoque_minimo'=>10],

            ['categoria_id'=>4,'nome'=>'Cadeira','codigo'=>'OUT001','quantidade'=>20,'estoque_minimo'=>2],
            ['categoria_id'=>4,'nome'=>'Mesa','codigo'=>'OUT002','quantidade'=>10,'estoque_minimo'=>2],
            ['categoria_id'=>4,'nome'=>'Caixa de Papelao','codigo'=>'OUT003','quantidade'=>100,'estoque_minimo'=>20]

        ]);
    }
}
