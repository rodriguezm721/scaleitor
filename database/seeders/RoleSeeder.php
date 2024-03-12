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

        $permission_create_contacto = Permission::create(['name' => 'create contactos']);
        $permission_read_contacto = Permission::create(['name' => 'read contactos']);
        $permission_update_contacto = Permission::create(['name' => 'update contactos']);
        $permission_delete_contacto = Permission::create(['name' => 'delete contactos']);

        $permission_create_comentario = Permission::create(['name' => 'create comentarios']);
        $permission_read_comentario = Permission::create(['name' => 'read comentarios']);
        $permission_update_comentario = Permission::create(['name' => 'update comentarios']);
        $permission_delete_comentario = Permission::create(['name' => 'delete comentarios']);

        $permission_create_avance = Permission::create(['name' => 'create avances']);
        $permission_read_avance = Permission::create(['name' => 'read avances']);
        $permission_update_avance = Permission::create(['name' => 'update avances']);
        $permission_delete_avance = Permission::create(['name' => 'delete avances']);

        $permission_create_cobro = Permission::create(['name' => 'create cobros']);
        $permission_read_cobro = Permission::create(['name' => 'read cobros']);
        $permission_update_cobro = Permission::create(['name' => 'update cobros']);
        $permission_delete_cobro = Permission::create(['name' => 'delete cobros']);

        $permissions_admin = [
            $permission_create_servicio, $permission_read_servicio, $permission_update_servicio, $permission_delete_servicio, 
            $permission_create_contrato, $permission_read_contrato, $permission_update_contrato, $permission_delete_contrato,
            $permission_create_convenio, $permission_read_convenio, $permission_update_convenio, $permission_delete_convenio,
            $permission_create_contacto, $permission_read_contacto, $permission_update_contacto, $permission_delete_contacto,
            $permission_create_comentario, $permission_read_comentario, $permission_update_comentario, $permission_delete_comentario,
            $permission_create_avance, $permission_read_avance, $permission_update_avance, $permission_delete_avance,
            $permission_create_cobro, $permission_read_cobro, $permission_update_cobro, $permission_delete_cobro

        ];

        $permissions_editor = [
            $permission_create_servicio, $permission_read_servicio, $permission_update_servicio, $permission_delete_servicio, 
            $permission_create_contrato, $permission_read_contrato, $permission_update_contrato, $permission_delete_contrato,
            $permission_create_convenio, $permission_read_convenio, $permission_update_convenio, $permission_delete_convenio,
            $permission_create_contacto, $permission_read_contacto, $permission_update_contacto, $permission_delete_contacto,
            $permission_create_comentario, $permission_read_comentario, $permission_update_comentario, $permission_delete_comentario,
            $permission_create_avance, $permission_read_avance, $permission_update_avance, $permission_delete_avance,
            $permission_create_cobro, $permission_read_cobro, $permission_update_cobro, $permission_delete_cobro
        ];

        $permissions_lector = [
            $permission_read_servicio, 
            $permission_read_contrato, 
            $permission_read_convenio,
            $permission_read_contacto, 
            $permission_read_comentario,
            $permission_read_avance, 
            $permission_read_cobro,
            $permission_create_comentario,
            $permission_delete_comentario
        ];

        //$role_editor->givePermissionTo($permission_create_contrato);
        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_editor);
        $role_lector->syncPermissions($permissions_lector);
    }
}
