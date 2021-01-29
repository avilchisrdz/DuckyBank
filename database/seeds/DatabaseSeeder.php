<?php

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
        DB::table('roles')->insert([
            'description' => 'ADMINISTRADOR',
            'slug' => 'ADMINISTRADOR',
        ]);
        DB::table('roles')->insert([
            'description' => 'CAJERO',
            'slug' => 'CAJERO',
        ]);        

        DB::table('user_statuses')->insert([
            'description' => 'ACTIVO',
            'slug' => 'ACTIVO',
        ]);  
        DB::table('user_statuses')->insert([
            'description' => 'INACTIVO',
            'slug' => 'INACTIVO',
        ]);  
        DB::table('user_statuses')->insert([
            'description' => 'OCUPADO',
            'slug' => 'OCUPADO',
        ]); 

        DB::table('users')->insert([
        	'rfc' => 'EAML010101DKL',
            'name' => 'Eli Alejandro',
            'lastname' => 'Moreno Lopez',
            'email' => 'ingeli@gmail.com',
            'password' => '$2y$10$EmsI4g.ZA6dbMYqiSCLDuezahaeiH7IxZ05uLZdLoo8D5JFf4cv9K',
            'role_id' => '1',
        ]);          
        DB::table('users')->insert([
        	'rfc' => 'VIRA9702024I0',
            'name' => 'Angel Antonio',
            'lastname' => 'Vilchis Rodríguez',
            'email' => 'vilchis@gmail.com',
            'password' => '$2y$10$EmsI4g.ZA6dbMYqiSCLDuezahaeiH7IxZ05uLZdLoo8D5JFf4cv9K',
            'role_id' => '2',
        ]); 
    }
}
