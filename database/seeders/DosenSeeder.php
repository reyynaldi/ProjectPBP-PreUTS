<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::create([
            'nidn' => '123456789011',
            'nama' => 'Bambang Sudayana',
            'email' => 'bambang@lecturers.undip.ac.id',
            'kode_departemen' => 'IF'

            // field lainnya
        ]);
        Dosen::create([
            'nidn' => '123456789012',
            'nama' => 'Siti Burayuti',
            'email' => 'siti@lecturers.undip.ac.id',
            'kode_departemen' => 'IF'

            // field lainnya
        ]);
    }
}
