<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      
       DB::table('roles')->insert([

        [
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'site_manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]

        ]);

       DB::table('permissions')->insert([

        [
            'name' => 'view_all_contractors',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'view_contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'create_contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'update_contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'delete_contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

    ]);


    $admin = Role::find(1);
    $admin->syncPermissions([
        1,
        2,
        3,
        4,
        5,
    ]);
    }
}
