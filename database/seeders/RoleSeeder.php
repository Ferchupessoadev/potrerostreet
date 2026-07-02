<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Player
            'player.index',
            'player.show',
            'player.kick',
            'player.ban',
            'player.update',
            'player.destroy',
            // VIP
            'prefix.update',
            'prefix.destroy',
            'size.update',
            'size.destroy'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Admin
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->givePermissionTo($permissions);

        // Moderator
        $role = Role::firstOrCreate(['name' => 'moderator']);
        $role->givePermissionTo('player.index');
        $role->givePermissionTo('player.show');
        $role->givePermissionTo('player.kick');
        $role->givePermissionTo('player.ban');

        // VIP
        $role = Role::firstOrCreate(['name' => 'vip']);
        $role->givePermissionTo('prefix.update');
        $role->givePermissionTo('prefix.destroy');
        $role->givePermissionTo('size.update');
        $role->givePermissionTo('size.destroy');
    }
}
