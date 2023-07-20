<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            //blogs permissions
            'blogs.index', 
            'blogs.create', 
            'blogs.edit',
            'blogs.destroy',

             //rol permissions
            'roles.index',
            'roles.create', 
            'roles.edit',
            'roles.destroy',

             //users permissions
            'users.index',
            'users.create', 
            'users.edit',
            'users.destroy'
        ];

        $roleTo = Role::create(['name' => 'admin','guard_name' => 'web']);
        foreach($permissions as $permission){
            $permissionTo = Permission::create(['name' => $permission, 'guard_name' => 'web']);
            $roleTo->givePermissionTo($permissionTo); 
            //$roleTo->syncPermissions($permissionTo);
        }
    }
}
