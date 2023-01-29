<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            ['permission' => 'edit_users'],
            ['permission' => 'add_users'],
            ['permission' => 'delete_users'],
            ['permission' => 'view_users'],
        ]);
    }
}
