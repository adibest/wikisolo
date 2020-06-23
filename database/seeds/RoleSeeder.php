<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::insert([
          [
            'name' => 'Admin'
          ],
          [
            'name' => 'Editor'
          ],
          [
            'name' => 'Kontributor'
          ]
        ]);
    }
}
