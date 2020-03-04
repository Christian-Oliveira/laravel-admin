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
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_admin_material_consumo',
	        'strvalor' => 13,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_admin_material_permanente',
	        'strvalor' => 14,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_almoxarifado',
	        'strvalor' => 29,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_cadastro_permanente',
	        'strvalor' => 30,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_devolucao',
	        'strvalor' => 19,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_gerente_material_consumo',
	        'strvalor' => 5,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_gerente_material_permanente',
	        'strvalor' => 4,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tblconfig')->insert([
            'strchave' => 'id_manutencao',
	        'strvalor' => 21,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
