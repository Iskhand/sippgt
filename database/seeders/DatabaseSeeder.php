<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'divisi' => 'admin',
        ]);
        User::create([
            'name' => 'Julia',
            'email' => 'mandor1@gmail.com',
            'password' => Hash::make('mandor123'),
            'role' => 'mandor',
            'divisi' => 'BLOK 1'
        ]);
        User::create([
            'name' => 'Maya',
            'email' => 'mandor2@gmail.com',
            'password' => Hash::make('mandor123'),
            'role' => 'mandor',
            'divisi' => 'BLOK 3'
        ]);
        User::create([
            'name' => 'Anis',
            'email' => 'mandor3@gmail.com',
            'password' => Hash::make('mandor123'),
            'role' => 'mandor',
            'divisi' => 'BLOK 3'
        ]);
    }
}
