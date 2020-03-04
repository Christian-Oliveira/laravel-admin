<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProfilesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(PoloTableSeeder::class);
        $this->call(SetorTableSeeder::class);
        $this->call(FuncionarioTableSeeder::class);
    }
}
