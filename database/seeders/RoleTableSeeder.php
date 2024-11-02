<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Seed the roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Création des permissions si elles n'existent pas
        $permissions = [
            [
                'name' => 'role',
                'guard_name' => 'web',
                'title' => 'Role Permission'
            ],
            [
                'name' => 'role-add',
                'guard_name' => 'web',
                'title' => 'Add Role'
            ],
            [
                'name' => 'role-list',
                'guard_name' => 'web',
                'title' => 'List Role'
            ],
            [
                'name' => 'permission',
                'guard_name' => 'web',
                'title' => 'Permission'
            ],
            [
                'name' => 'permission-add',
                'guard_name' => 'web',
                'title' => 'Add Permission'
            ],
            [
                'name' => 'permission-list',
                'guard_name' => 'web',
                'title' => 'List Permission'
            ],
            // Add other permissions as needed
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission['name']], $permission);
        }

        // Définition des rôles avec leurs permissions
        $roles = [
            [
                'name' => 'admin',
                'title' => 'Admin',
                'status' => 1,
                'permissions' => ['role', 'role-add', 'role-list', 'permission', 'permission-add', 'permission-list']
            ],
            [
                'name' => 'demo_admin',
                'title' => 'Demo Admin',
                'status' => 1,
                'permissions' => []
            ],
            [
                'name' => 'user',
                'title' => 'User',
                'status' => 1,
                'permissions' => []
            ]
        ];

        foreach ($roles as $roleData) {
            $permissions = $roleData['permissions'];
            unset($roleData['permissions']);
            $role = Role::firstOrCreate(['name' => $roleData['name']], $roleData);

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
        }

        // Assignation du rôle 'admin' à un utilisateur spécifique (si l'utilisateur existe)
        $user = User::find(1); // Remplacez par l'ID de votre utilisateur admin
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
