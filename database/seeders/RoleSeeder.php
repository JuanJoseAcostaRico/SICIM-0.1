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
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Administrador']);
        $user = Role::create(['name' => 'Usuario']);

        //HOME
        Permission::create(['name' => 'home'])->syncRoles([$admin, $user]);

        //PERMISOS MENÚ
        Permission::create(['name' => 'menu.admin'])->syncRoles([$admin]);

        //PERMISOS MODULO USUARIOS
        Permission::create(['name' => 'usuarios.lista'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.registro'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'usuarios.buttons'])->syncRoles([$admin]);

        //PERMISOS MODULO DEPARTAMENTOS
        Permission::create(['name' => 'departamento.lista'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'departamento.registro'])->syncRoles([$admin]);
        Permission::create(['name' => 'departamento.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'departamento.show'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'departamento.buttons'])->syncRoles([$admin]);

        //PERMISOS MODULO INSUMOS
        Permission::create(['name' => 'inventario.insumos.lista'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.insumos.registro'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.insumos.edit'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.insumos.show'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.insumos.buttons'])->syncRoles([$admin]);

        //PERMISOS MODULO MOVIMIENTOS
        Permission::create(['name' => 'inventario.movimientos.lista'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.movimientos.registro'])->syncRoles([$admin], $user);
        Permission::create(['name' => 'inventario.insumos.movimientos.show'])->syncRoles([$admin], $user);

        //PERMISOS MODULO INSTRUMENTOS
        Permission::create(['name' => 'inventario.instrumentos.lista'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.instrumentos.registro'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.instrumentos.edit'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.instrumentos.show'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'inventario.instrumentos.buttons'])->syncRoles([$admin]);

        //PERMISOS REPORTES
        Permission::create(['name' => 'panel.reportes'])->syncRoles([$admin]);
        Permission::create(['name' => 'panel.reportes.buttons'])->syncRoles([$admin]);

        //PERMISOS RESPALDO Y RESTAURACIÓN
        Permission::create(['name' => 'respaldo.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'panel.respaldo.buttons'])->syncRoles([$admin]);
    }
}
