<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        $collection = collect([
            'Invoice',
            'Client',
            'Contact',
            'Payment',
            'Team',
            'User',
            'Role',
            'Permission'
        ]);

        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::create(['guard_name' => 'web', 'name' => 'viewAny' . $item]);
            Permission::create(['guard_name' => 'web', 'name' => 'view' . $item]);
            Permission::create(['guard_name' => 'web', 'name' => 'update' . $item]);
            Permission::create(['guard_name' => 'web', 'name' => 'create' . $item]);
            Permission::create(['guard_name' => 'web', 'name' => 'delete' . $item]);
            Permission::create(['guard_name' => 'web', 'name' => 'destroy' . $item]);
        });

        // Create a Super-Admin Role and assign all permissions to it
        $role = Role::create(['name'=>'super-admin', 'guard_name'=>'web']);
        $role->givePermissionTo(Permission::all());
        $user = User::find(1);
         $user->assignRole(['super-admin']);
    }
}
