<?php

use Illuminate\Database\Seeder;

class QTriVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_tri_viens')->insert([
        	[
        	'email'=>'admin@gmail.com',
        	'password' => bcrypt('admin123'),
        	'ho_ten' => 'Admin123',
        ],
        [
        	'email' => 'minh@gmail.com',
        	'password' => bcrypt('matkhau'),
        	'ho_ten' => 'HungMinh',
        ]
        ]);    
    }
}
