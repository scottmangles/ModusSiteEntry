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

        [   // id 1
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 2
            'name' => 'site_manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 3
            'name' => 'manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]

        ]);

       DB::table('permissions')->insert([
        
        // Contractor model
        [   // id 1
            'name' => 'view all contractors',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 2
            'name' => 'create contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 3
            'name' => 'store contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 4
            'name' => 'show contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 5
            'name' => 'edit contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 6
            'name' => 'update contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 7
            'name' => 'delete contractor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        // Option model
        [   // id 8
            'name' => 'view all options',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 9
            'name' => 'create option',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 10
            'name' => 'store option',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 11
            'name' => 'show option',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 12
            'name' => 'edit option',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 13
            'name' => 'update option',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 14
            'name' => 'delete option',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        // Question model
        [   // id 15
            'name' => 'view all questions',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 16
            'name' => 'create question',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 17
            'name' => 'store question',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 18
            'name' => 'show question',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 19
            'name' => 'edit question',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 20
            'name' => 'update question',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 21
            'name' => 'delete question',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

            // siteAccess controller
        [   // id 22
            'name' => 'show users with no site access',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 23
            'name' => 'show users with site access',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 24
            'name' => 'show users banned from site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 25
            'name' => 'allow access to site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 26
            'name' => 'allow supervised access to site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 27
            'name' => 'update site access to granted',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 28
            'name' => 'update site access to supervised',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 29
            'name' => 'ban user from site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        // Site model
        [   // id 30
            'name' => 'view all sites',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 31
            'name' => 'create site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 32
            'name' => 'store site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 33
            'name' => 'show site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 34
            'name' => 'edit site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 35
            'name' => 'update site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 36
            'name' => 'delete site',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

         // SiteUser Controller
         [   // id 37
            'name' => 'sign out by site manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 38
            'name' => 'sign in by site manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        // User model
        [   // id 39
            'name' => 'view all users',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 40
            'name' => 'show user',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 41
            'name' => 'delete user',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ], 

         // RolePermission Controller
         [   // id 42
            'name' => 'view all user roles and permissions',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 43
            'name' => 'update role',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 44
            'name' => 'remove role from user',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 45
            'name' => 'add permission to user',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [   // id 46
            'name' => 'remove permission from user',
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
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        18,
        19,
        20,
        21,
        22,
        23,
        24,
       // 25, //potentially only allow initial access granted or supervised to site by site manager
      //  26,
        27,
        28,
        29,
        30,
        31,
        32,
        33,
        34,
        35,
        36,
        //37, // sign out site manager
        //38, // sign in site manager
        39,
        40,
        41,
        42,
        43,
        44,
        45,
        46,

    ]);
    }
}
