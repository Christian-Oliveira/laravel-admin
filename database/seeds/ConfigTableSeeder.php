<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblconfig')->insert([
            'strchave' => 'id_admin_geral',
	        'strvalor' => 3,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_admin_material_consumo',
	        'strvalor' => 13,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_admin_material_permanente',
	        'strvalor' => 14,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_almoxarifado',
	        'strvalor' => 29,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_cadastro_permanente',
	        'strvalor' => 30,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_devolucao',
	        'strvalor' => 19,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_gerente_material_consumo',
	        'strvalor' => 5,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_gerente_material_permanente',
	        'strvalor' => 4,
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_manutencao',
	        'strvalor' => 21,
        ]);
    }
}
