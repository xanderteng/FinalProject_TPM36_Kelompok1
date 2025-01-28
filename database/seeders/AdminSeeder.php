<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Check if admin already exists, if not, create it
        if (!User::where('team_name', 'Admin')->exists()) {
            User::create([
                'team_name' => 'Admin',
                'password' => bcrypt('yourpassword'),
                'role' => 'admin',
                'leader_name' => 'Admin',
                'leader_email' => 'admin@example.com',
                'leader_whatsapp' => '1234567890',
                'leader_line' => 'adminline',
                'leader_github' => 'adminhub',
                'leader_birth_place' => 'Admin City',
                'leader_birth_date' => '2000-01-01',
                'leader_cv' => 'cv_file.pdf',  // Example
                'binusian' => 1,  // Boolean
                'leader_card' => 'id_card.pdf',  // Example
            ]);
        }
    }
}
