<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipSeeder::class);
        $this->call(OpisSeeder::class);
        $this->call(UslugaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ParcelaSeeder::class);
        $this->call(KaznaSeeder::class);
        $this->call(GPSeeder::class);
        $this->call(UGPSeeder::class);
        $this->call(CijenePoGodinamaSeeder::class);
    }
} 