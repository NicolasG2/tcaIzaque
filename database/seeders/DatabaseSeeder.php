<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Estados
        $estados = [
            ['nome' => 'Acre', 'sigla' => 'AC'],
            ['nome' => 'Alagoas', 'sigla' => 'AL'],
            ['nome' => 'Amazonas', 'sigla' => 'AM'],
            ['nome' => 'Bahia', 'sigla' => 'BA'],
            ['nome' => 'Ceará', 'sigla' => 'CE'],
            ['nome' => 'Espírito Santo', 'sigla' => 'ES'],
            ['nome' => 'Goiás', 'sigla' => 'GO'],
            ['nome' => 'Maranhão', 'sigla' => 'MA'],
            ['nome' => 'Mato Grosso', 'sigla' => 'MT'],
            ['nome' => 'Mato Grosso do Sul', 'sigla' => 'MS'],
            ['nome' => 'Minas Gerais', 'sigla' => 'MG'],
            ['nome' => 'Pará', 'sigla' => 'PA'],
            ['nome' => 'Paraíba', 'sigla' => 'PB'],
            ['nome' => 'Paraná', 'sigla' => 'PR'],
            ['nome' => 'Pernambuco', 'sigla' => 'PE'],
            ['nome' => 'Piauí', 'sigla' => 'PI'],
            ['nome' => 'Rio de Janeiro', 'sigla' => 'RJ'],
            ['nome' => 'Rio Grande do Norte', 'sigla' => 'RN'],
            ['nome' => 'Rio Grande do Sul', 'sigla' => 'RS'],
            ['nome' => 'Rondônia', 'sigla' => 'RO'],
            ['nome' => 'Roraima', 'sigla' => 'RR'],
            ['nome' => 'Santa Catarina', 'sigla' => 'SC'],
            ['nome' => 'São Paulo', 'sigla' => 'SP'],
            ['nome' => 'Sergipe', 'sigla' => 'SE'],
            ['nome' => 'Tocantins', 'sigla' => 'TO'],
        ];
        DB::table('estados')->insert($estados);

        // Cores
        $cors = [
            ['nome' => 'Branco'],
            ['nome' => 'Preto'],
            ['nome' => 'Prata'],
            ['nome' => 'Vermelho'],
            ['nome' => 'Azul'],
        ];
        DB::table('cors')->insert($cors);

        // Marcas
        $marcas = [
            ['nome' => 'Toyota'],
            ['nome' => 'Volkswagen'],
            ['nome' => 'Ford'],
            ['nome' => 'Chevrolet'],
            ['nome' => 'Honda'],
        ];
        DB::table('marcas')->insert($marcas);

        // Modelos
        $modelos = [
            ['nome' => 'Corolla', 'marca_id' => 1],
            ['nome' => 'Hilux', 'marca_id' => 1],
            ['nome' => 'Golf', 'marca_id' => 2],
            ['nome' => 'Polo', 'marca_id' => 2],
            ['nome' => 'Mustang', 'marca_id' => 3],
            ['nome' => 'Camaro', 'marca_id' => 4],
            ['nome' => 'Civic', 'marca_id' => 5],
        ];
        DB::table('modelos')->insert($modelos);

        // Carros
        $carros = [
            ['placa' => 'ABC-1234', 'modelo_id' => 1, 'estado_id' => 1, 'cor_id' => 1],
            ['placa' => 'DEF-5678', 'modelo_id' => 2, 'estado_id' => 2, 'cor_id' => 2],
            ['placa' => 'GHI-9012', 'modelo_id' => 3, 'estado_id' => 3, 'cor_id' => 3],
            ['placa' => 'JKL-3456', 'modelo_id' => 4, 'estado_id' => 4, 'cor_id' => 4],
            ['placa' => 'MNO-7890', 'modelo_id' => 5, 'estado_id' => 5, 'cor_id' => 5],
        ];
        DB::table('carros')->insert($carros);
    }
}
