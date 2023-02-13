<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit profile']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'staff']);
        $role->givePermissionTo('edit profile');

        // or may be done by chaining
        $role = Role::create(['name' => 'manager'])
            ->givePermissionTo([
                'edit profile',
                'create users',
                'edit users',
                'delete users',
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@hungtrieu.top',
            'password' => Hash::make('admin47@top')
        ]);
    }
}
