<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' =>'$2y$12$uCV0rNxClK4zE2/PFuwCSuZqY06rW1Tjtfp41mTGR19t33oQsxDC2' ,
        ]);

        $user->assignRole('admin');
    }
}
