<?php

namespace Database\Seeders;
use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::create([
          
            'documento'=> '56456456',
            'nombre' => 'alex el mejor',
            'apellido'=> 'ariza duarte'
        ]);
    }
}
