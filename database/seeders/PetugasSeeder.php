<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Petugas::create([
            'nip' => '123456789',
            'nama_petugas' => 'Admin'
        ]);
        Petugas::create([
            'nip' => '1234567890',
            'nama_petugas' => 'Petugas'
        ]);
    }
}
