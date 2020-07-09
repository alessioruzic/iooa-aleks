<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'StudentIme-A',
            'surname' => 'StudentPrezime-A',
            'password' => Hash::make('12345678'),
            'email' => 'student1@veleri.hr',
            'oib' => '12345678901',
            'dateBorn' => '1994-01-01',
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'StudentIme-K',
            'surname' => 'StudentPrezime-K',
            'password' => Hash::make('12345678'),
            'email' => 'student2@gmail.com',
            'oib' => '12345678902',
            'dateBorn' => '1993-01-02',
            'role_id' => 3,
        ]);
    }
}
