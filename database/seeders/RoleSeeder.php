<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);
        $role_lector = Role::create(['name' => 'lector']);

        $permission_create_servicio = Permission::create(['name' => 'create servicios']);
        $permission_read_servicio = Permission::create(['name' => 'read servicios']);
        $permission_update_servicio = Permission::create(['name' => 'update servicios']);
        $permission_delete_servicio = Permission::create(['name' => 'delete servicios']);

        $permission_create_contrato = Permission::create(['name' => 'create contratos']);
        $permission_read_contrato = Permission::create(['name' => 'read contratos']);
        $permission_update_contrato = Permission::create(['name' => 'update contratos']);
        $permission_delete_contrato = Permission::create(['name' => 'delete contratos']);

        $permission_create_convenio = Permission::create(['name' => 'create convenios']);
        $permission_read_convenio = Permission::create(['name' => 'read convenios']);
        $permission_update_convenio = Permission::create(['name' => 'update convenios']);
        $permission_delete_convenio = Permission::create(['name' => 'delete convenios']);

        $permissions_admin = [
            $permission_create_servicio, $permission_read_servicio, $permission_update_servicio, $permission_delete_servicio, 
            $permission_create_contrato, $permission_read_contrato, $permission_update_contrato, $permission_delete_contrato,
            $permission_create_convenio, $permission_read_convenio, $permission_update_convenio, $permission_delete_convenio
        ];

        $permissions_editor = [
            $permission_create_servicio, $permission_read_servicio, $permission_update_servicio, $permission_delete_servicio, 
            $permission_create_contrato, $permission_read_contrato, $permission_update_contrato, $permission_delete_contrato,
            $permission_create_convenio, $permission_read_convenio, $permission_update_convenio, $permission_delete_convenio
        ];

        $permissions_lector = [
            $permission_read_servicio, 
            $permission_read_contrato, 
            $permission_read_convenio
        ];

        //$role_editor->givePermissionTo($permission_create_contrato);
        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_editor);
        $role_lector->syncPermissions($permissions_lector);
    }
}
