<?php

use Illuminate\Database\Seeder;

class SetorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblsetor')->insert([
            'strsetor' => 'Informática',
	        'strsigla' => 'TI',
            'idpolo' => 1,
            'bolativo' => 1,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
