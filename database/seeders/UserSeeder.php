<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name'  =>  'admin',
            'email' =>  'admin@admin.com',
            'password'  =>  Hash::make('123456'),
            'telepon' => '081233543',
            'sim' => '1223124324',
            'alamat' => 'Jakarta',
        ]);
    }
}
