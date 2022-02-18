<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user-viewAny',
            'user-create',
            'user-edit',
            'user-delete',
            'user-view',
            'user-restore',
            'user-forceDelete',
            'user-update',
            'user-store',

            'role-viewAny',
            'role-create',
            'role-edit',
            'role-delete',
            'role-view',
            'role-restore',
            'role-forceDelete',
            'role-update',
            'role-store',
            
            'permission-viewAny',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-view',
            'permission-restore',
            'permission-forceDelete',
            'permission-update',
            'permission-store',

            'post-viewAny',
            'post-create',
            'post-edit',
            'post-delete',
            'post-view',
            'post-restore',
            'post-forceDelete',
            'post-update',
            'post-store',

            'setting-viewAny',
            'setting-delete',
            'setting-view',
            'setting-edit',
            'setting-create',
            'setting-restore',
            'setting-forceDelete',
            'setting-update',
            'setting-store',

            'city-viewAny',
            'city-delete',
            'city-view',
            'city-edit',
            'city-create',
            'city-restore',
            'city-forceDelete',
            'city-update',
            'city-store',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
