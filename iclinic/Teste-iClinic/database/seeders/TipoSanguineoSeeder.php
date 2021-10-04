<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoSanguineo;

class TipoSanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'id', 'descricao'
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "A+"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "A-"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "B+"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "B-"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "AB+"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "AB-"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "O+"
                 
        ]);
        TipoSanguineo::create([
            //  'id'          => 1,
                'descricao'      => "O-"
                 
        ]);
    }
}
