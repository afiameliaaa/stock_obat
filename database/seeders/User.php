<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsUser::factory()->create([
            'name' => 'Afi',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'kabag'
        ]);
    }
}
