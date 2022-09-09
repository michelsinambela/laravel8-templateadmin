<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employesses')->insert([
            'nama' => 'Michel Sinambela',
            'jenkel' => 'pria',
            'alamat' => 'Pematang Siantar',
            'notelpon' => '081233445577',
            'jabatan' => 'PNS',
        ]);
    }
}
