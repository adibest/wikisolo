<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
          [
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'role_id' => '1'
          ],
          [
            'name' => 'Editor',
            'email' => 'editor@editor',
            'password' => Hash::make('editor'),
            'role_id' => '2'
          ],
          [
            'name' => 'Kontributor',
            'email' => 'kontri@kontri',
            'password' => Hash::make('kontributor'),
            'role_id' => '3'
          ]
        ]);
    }
}
