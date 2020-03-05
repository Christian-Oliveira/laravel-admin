<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblfuncionario')->insert([
            'username' => 'teste2',
	        'password' => bcrypt('121314'),
	        'strnome' => 'Teste2',
            'strchave_config' => 'id_admin_geral',
            'profile_id' => 3,
            'idsetor' => 1,
            'idstatus' => 'ativo',
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
	    ]);
    }
}
