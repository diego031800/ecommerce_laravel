<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'home.admin'])->syncRoles($role1);
        Permission::create(['name' => 'categorias.index'])->syncRoles($role1);
        Permission::create(['name' => 'categorias.create'])->syncRoles($role1);
        Permission::create(['name' => 'categorias.edit'])->syncRoles($role1);
        Permission::create(['name' => 'graficos.pedidos'])->syncRoles($role1);
        
        Permission::create(['name' => 'pedidos.index'])->syncRoles($role1);
        Permission::create(['name' => 'pedidos.create'])->syncRoles($role1);
        Permission::create(['name' => 'pedidos.edit'])->syncRoles($role1);
        Permission::create(['name' => 'pedidos.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'productos.index'])->syncRoles($role1);
        Permission::create(['name' => 'productos.create'])->syncRoles($role1);
        Permission::create(['name' => 'productos.edit'])->syncRoles($role1);
        Permission::create(['name' => 'productos.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'proveedores.index'])->syncRoles($role1);
        Permission::create(['name' => 'proveedores.create'])->syncRoles($role1);
        Permission::create(['name' => 'proveedores.edit'])->syncRoles($role1);
        Permission::create(['name' => 'proveedores.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'users.index'])->syncRoles($role1);
        Permission::create(['name' => 'users.edit'])->syncRoles($role1);

        Permission::create(['name' => 'carrito.detalles'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'carrito_details.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'carrito_details.store'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'user.productos.show'])->syncRoles([$role1, $role2]);
    }
}
