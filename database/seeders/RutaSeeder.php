<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruta;
class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruta::create([
            'codigo' => 'g12',
            'nombre'=> 'zona sur',
            'latitud' => '6.642772889788',
            'longitud'=> '-68.0233312'
        ]);
        Ruta::create([
            'codigo' => 'f412',
            'nombre'=> 'zona magdalena 21',
            'latitud' => '5.6427728897',
            'longitud'=> '-59.0233312'
        ]);
        Ruta::create([
            'codigo' => 'p812',
            'nombre'=> 'zona norte de cali',
            'latitud' => '3.6427728897',
            'longitud'=> '-66.023331269'
        ]);
        Ruta::create([
            'codigo' => 'e5812',
            'nombre'=> 'zona sur occidente',
            'latitud' => '15.64277288',
            'longitud'=> '-52.023331269'
        ]);
        Ruta::create([
            'codigo' => 'l4812',
            'nombre'=> 'zona occidente',
            'latitud' => '8.64277288978',
            'longitud'=> '-25.023331269'
        ]);
    }
}
