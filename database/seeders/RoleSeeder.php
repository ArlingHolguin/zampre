<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // superadmin 
        $c_superAdmin = User::create([
            'name' => 'superadmin',
            'email' => 'super@super.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(16),
        ]);

        //Admin 
        $c_admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(16),
        ]);

        //cliente
        $c_cliente = User::create([
            'name' => 'cliente',
            'email' => 'cliente@cliente.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(16),
        ]);

        $c_logistico = User::create([
            'name' => 'logistico',
            'email' => 'logistico@logistico.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(16),
        ]);

        

        //Roles
        $r_superAdmin = Role::create(['name' => 'superadmin']);

        $r_admin = Role::create(['name' => 'admin']);
        $r_cliente = Role::create(['name' => 'cliente']);
        $r_logistica = Role::create(['name' => 'logistica']);
        
        $viewAllUserPermission = Permission::create(['name' => 'view users']);
        $viewSingleUserPermission = Permission::create(['name' => 'view user']); 
        $addUserPermission = Permission::create(['name' => 'add user']);   
        $editUserPermission = Permission::create(['name' => 'edit user']);    
        $deleteUserPermission = Permission::create(['name' => 'delete user']);   
        $manageUserRolesPermission = Permission::create(['name' => 'manage user roles']); 

        $viewAllRolePermission = Permission::create(['name' => 'view roles']);
        $viewSingleRolePermission = Permission::create(['name' => 'view role']); 
        $addRolePermission = Permission::create(['name' => 'add role']);   
        $editRolePermission = Permission::create(['name' => 'edit role']);    
        $deleteRolePermission = Permission::create(['name' => 'delete role']);  

        $viewAllPermissionPermission = Permission::create(['name' => 'view permissions']);
        $viewSinglePermissionPermission = Permission::create(['name' => 'view permission']); 
        $addPermissionPermission = Permission::create(['name' => 'add permission']);   
        $editPermissionPermission = Permission::create(['name' => 'edit permission']);    
        $deletePermissionPermission = Permission::create(['name' => 'delete permission']);

        $productos = Permission::create(['name' => 'productos']);
        $ordenes = Permission::create(['name' => 'ordenes']);
        $categorias = Permission::create(['name' => 'categorias']);
        $marcas = Permission::create(['name' => 'marcas']);
        $users = Permission::create(['name' => 'users']);

        //cambiar el estado de una orden admin y super
        $changeOrderStatusPermission = Permission::create(['name' => 'change order status']);
        $settings = Permission::create(['name' => 'settings']);

        

        //Assign permissions to admin user
        $r_admin->syncPermissions([
                    $viewAllUserPermission, $viewSingleUserPermission, $addUserPermission, $editUserPermission, $deleteUserPermission, $viewAllRolePermission,
                    $viewSingleRolePermission, $addRolePermission, $editRolePermission, $deleteRolePermission, $viewAllPermissionPermission, $viewSinglePermissionPermission,
                    $addPermissionPermission, $editPermissionPermission, $deletePermissionPermission, $manageUserRolesPermission, $changeOrderStatusPermission, $productos, $ordenes, $categorias, $marcas, $users, $settings
                ]);

        $c_superAdmin->assignRole($r_superAdmin);
        $c_admin->assignRole($r_admin);
        $c_logistico->assignRole($r_logistica);
        $c_cliente->assignRole($r_cliente);
    }
}
