<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('porduct')->insert([
        [
            'name'=>'samsung mobile',
            'price'=>'30$',
            'category'=>('mobile'),
            'describtion'=>('smart phone')
        ],
        [
            'name'=>'iphone',
            'price'=>'200$',
            'category'=>('mobile'),
            'describtion'=>('smart phone')
        ],
        [
            'name'=>'hp labtop',
            'price'=>'500$',
            'category'=>('labtop'),
            'describtion'=>('smart labtop')
        ]
    ]);
    }
}
