<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '山田太郎'],
            ['name' => '鈴木花子'],
            ['name' => '田中次郎'],
            ['name' => '吉田芳子'],
            ['name' => '渡辺吾郎'],     
        ];
        \DB::table('customers')->insert($data);
    }
}
