<?php

namespace Database\Seeders;

use App\Models\Mandor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MandorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mandor::create([
            'nim' => 'MN001',
            'nama_mandor' => 'Julia',
            'username' => 'mandorb1',
            'password' => 'mandor123',
            'unit' => 'Blok 1',
        ]);
        Mandor::create([
            'nim' => 'MN002',
            'nama_mandor' => 'Maya',
            'username' => 'mandorb2',
            'password' => 'mandor123',
            'unit' => 'Blok 2',
        ]);
        Mandor::create([
            'nim' => 'MN003',
            'nama_mandor' => 'Sulastri',
            'username' => 'mandorb3',
            'password' => 'mandor123',
            'unit' => 'Blok 3',
        ]);
    }
}
