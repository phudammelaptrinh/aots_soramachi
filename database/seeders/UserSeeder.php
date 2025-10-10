<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superAdmins = [
            ['name' => 'Super Admin', 'email' => 'super@gmail.com'],
            ['name' => 'Nguyen Van Super', 'email' => 'super1@gmail.com'],
            ['name' => 'Tran Thi Super', 'email' => 'super2@gmail.com'],
        ];
        foreach ($superAdmins as $s) {
            User::updateOrCreate(
                ['email' => $s['email']],
                [
                    'name' => $s['name'],
                    'password' => Hash::make('123456'),
                    'role' => 'super admin',
                ]
            );
        }

       
        $admins = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com'],
            ['name' => 'Pham Van Admin', 'email' => 'admin1@gmail.com'],
            ['name' => 'Le Thi Admin', 'email' => 'admin2@gmail.com'],
            ['name' => 'Nguyen Quang Admin', 'email' => 'admin3@gmail.com'],
            ['name' => 'Tran Minh Admin', 'email' => 'admin4@gmail.com'],
            ['name' => 'Doan Anh Admin', 'email' => 'admin5@gmail.com'],
            ['name' => 'Bui Phuong Admin', 'email' => 'admin6@gmail.com'],
        ];
        foreach ($admins as $a) {
            User::updateOrCreate(
                ['email' => $a['email']],
                [
                    'name' => $a['name'],
                    'password' => Hash::make('123456'),
                    'role' => 'admin',
                ]
            );
        }

       
        $users = [
            ['name' => 'Normal User', 'email' => 'user@gmail.com'],
            ['name' => 'Nguyen Van A', 'email' => 'user1@gmail.com'],
            ['name' => 'Tran Thi B', 'email' => 'user2@gmail.com'],
            ['name' => 'Le Van C', 'email' => 'user3@gmail.com'],
            ['name' => 'Pham Thi D', 'email' => 'user4@gmail.com'],
            ['name' => 'Hoang Van E', 'email' => 'user5@gmail.com'],
            ['name' => 'Do Thi F', 'email' => 'user6@gmail.com'],
            ['name' => 'Bui Van G', 'email' => 'user7@gmail.com'],
            ['name' => 'Ngo Thi H', 'email' => 'user8@gmail.com'],
            ['name' => 'Pham Van I', 'email' => 'user9@gmail.com'],
        ];
        foreach ($users as $u) {
            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('123456'),
                    'role' => 'user',
                ]
            );
        }
    }
}
