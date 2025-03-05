<?php
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Hemang Lakhadiya',
            'email' => 'hemanglakhadiya49@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
