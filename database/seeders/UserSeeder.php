<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@scalapc.com',
            'email_verified_at' => now(),
            'role' => 'Admin',
            'password' => Hash::make('DACeslaonda69'),
        ]);

        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@scalapc.com',
            'email_verified_at' => now(),
            'role' => 'Editor',
            'password' => Hash::make('DACeslaonda69'),
            
        ]);

        $editor->assignRole('editor');
    }
}
