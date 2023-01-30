<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SeederPermissionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'ver-blog',
            'crear-blog', 
            'editar-blog',
            'eliminar-blog',

            'ver-rol',
            'crear-rol', 
            'editar-rol',
            'eliminar-rol',
        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
