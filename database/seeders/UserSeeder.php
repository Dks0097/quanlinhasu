<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //
        $users = [
            [ 'role_id' => 1, 'name' => 'Dương', 'email' => 'admin@gmail.com', 'phone' => '+88 (014) 22-455656', 'status' => 1, 'password' => Hash::make('admin') ],
            [ 'role_id' => 1, 'name' => 'Dương', 'email' => 'duongcochym@gmail.com', 'phone' => '+88 (015) 22-455656', 'status' => 1, 'password' => Hash::make('admin') ],
            [ 'role_id' => 1, 'name' => 'Dương', 'email' => 'shawonk007@gmail.com', 'phone' => '+88 (016) 88-947741', 'status' => 1, 'password' => Hash::make('1111') ],
            [ 'role_id' => 2, 'name' => 'Dương', 'email' => 'tony@stark.com', 'phone' => '+88 (012) 34-567890', 'status' => 1, 'password' => Hash::make('secret') ],
            [ 'role_id' => 3, 'name' => 'Anh huy', 'email' => 'anhhuy@email.com', 'phone' => '+88 (012) 34-567891', 'status' => 1, 'password' => Hash::make('1111') ],
            [ 'role_id' => 4, 'name' => 'Anh huy', 'email' => 'hr@email.com', 'phone' => '+88 (012) 34-567893', 'status' => 1, 'password' => Hash::make('1111') ],
            [ 'role_id' => 5, 'name' => 'Anh huy', 'email' => 'ketoan@email.com', 'phone' => '+88 (012) 34-567894', 'status' => 1, 'password' => Hash::make('1111') ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
