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

            'setting-viewAny',
            'setting-delete',
            'setting-view',
            'setting-edit',
            'setting-create',
            'setting-restore',
            'setting-forceDelete',
            'setting-update',
            'setting-store',

         

        ];

        foreach ($data as $permission) {
             Permission::updateOrCreate(['name' => $permission],['name' => $permission]);
        }
    }
}
