<?php

namespace Database\Seeders;
use \App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nama' => 'Mohamad Faisal Rizki',
            'nim' => '24060122130068',
            'email' => 'faisalrizki@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'doswal' => '123456789011'
            // field lainnya
        ]);
        Mahasiswa::create([
            'nama' => 'Gibran Nagrib',
            'nim' => '24060122130001',
            'email' => 'gibran@students.undip.ac.id',
            'kode_prodi' => 'IFS1',
            'doswal' => '123456789011'
            // field lainnya
        ]);
    }
}
