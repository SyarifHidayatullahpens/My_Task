<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = [
            [
                'name' => 'Sales & Marketing',
                'description' => 'Marketing merupakan sebuah divisi yang bertanggung jawab atas penjualan dan pemasaran produk yang dihasilkan oleh perusahaan'
            ],
            [
                'name' => 'Accounting',
                'description' => 'Departemen Accounting merupakan bagian yang mengatur keuangan perusahaan sampai dengan menghasilkan laporan keuangan'
            ],
        ];
        foreach($departements as $departement) {
           DB::table('departements')->insert($departement); 
        }
    }
}
