<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = [
            40 => ['bobot' => 0.8],
            26 => ['bobot' => 0.8],
        ];
        Disease::findOrFail(1)->symptoms()->attach($data1);

        $data2 = [
            44 => ['bobot' => 0.4],
            27 => ['bobot' => 0.3],
            11 => ['bobot' => 0.2],
            8 => ['bobot' => 0.3],
            24 => ['bobot' => 0.7],
            7 => ['bobot' => 0.4],
            37 => ['bobot' => 0.3],
            22 => ['bobot' => 0.6],
            33 => ['bobot' => 0.5],
        ];
        Disease::findOrFail(2)->symptoms()->attach($data2);

        $data3 = [
            3 => ['bobot' => 0.5],
            13 => ['bobot' => 0.7],
            27 => ['bobot' => 0.3],
            19 => ['bobot' => 0.3],
            35 => ['bobot' => 0.2],
        ];
        Disease::findOrFail(3)->symptoms()->attach($data3);

        $data4 = [
            27 => ['bobot' => 0.4],
            42 => ['bobot' => 0.3],
            32 => ['bobot' => 0.3],
            33 => ['bobot' => 0.6],
            31 => ['bobot' => 0.7],
            24 => ['bobot' => 0.7],
        ];
        Disease::findOrFail(4)->symptoms()->attach($data4);

        $data5 = [
            44 => ['bobot' => 0.4],
            27 => ['bobot' => 0.4],
            11 => ['bobot' => 0.2],
            8 => ['bobot' => 0.3],
            7 => ['bobot' => 0.4],
            34 => ['bobot' => 0.6],
            5 => ['bobot' => 0.6],
            14 => ['bobot' => 0.8],
        ];
        Disease::findOrFail(5)->symptoms()->attach($data5);

        $data6 = [
            43 => ['bobot' => 0.4],
            27 => ['bobot' => 0.4],
            17 => ['bobot' => 0.3],
            33 => ['bobot' => 0.3],
            10 => ['bobot' => 0.2],
            30 => ['bobot' => 0.6],
            38 => ['bobot' => 0.4],
            20 => ['bobot' => 0.5],
            29 => ['bobot' => 0.7],
            9 => ['bobot' => 0.6],
        ];
        Disease::findOrFail(6)->symptoms()->attach($data6);

        $data7 = [
            20 => ['bobot' => 0.4],
            21 => ['bobot' => 0.5],
            12 => ['bobot' => 0.7],
            6 => ['bobot' => 0.6],
            1 => ['bobot' => 0.8],
        ];
        Disease::findOrFail(7)->symptoms()->attach($data7);

        $data8 = [
            25 => ['bobot' => 0.6],
            41 => ['bobot' => 0.7],
            28 => ['bobot' => 0.8],
            36 => ['bobot' => 0.8],
            2 => ['bobot' => 0.5],
            39 => ['bobot' => 0.4],
            4 => ['bobot' => 0.4],
        ];
        Disease::findOrFail(8)->symptoms()->attach($data8);

        $data9 = [
            27 => ['bobot' => 0.3],
            23 => ['bobot' => 0.4],
            15 => ['bobot' => 0.8],
            16 => ['bobot' => 0.7],
            18 => ['bobot' => 0.7],
        ];
        Disease::findOrFail(9)->symptoms()->attach($data9);
    }
}
