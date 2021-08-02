<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companys = [
            [
                'nama' => 'Tokopedia',
                'email' => 'tokopedia@gmail.com',
                'logo'  => '',
                'website_url' => 'https://www.tokopedia.com/',
            ],
            [
                'nama' => 'Lazada',
                'email' => 'lazada@gmail.com',
                'logo'  => '',
                'website_url' => 'https://www.lazada.co.id/', 
            ]
        ];

        foreach($companys as $company) {
            DB::table('companys')->insert($company);
        }
        
    }
}
