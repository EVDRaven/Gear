<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $viewIndex = Permission::firstOrCreate([
            'name' => 'view-index',
            'guard_name' => 'web',
        ]);

        $controlGastos = Permission::firstOrCreate([
            'name' => 'control-gastos',
            'guard_name' => 'web',
        ]);

        $invitado = Role::firstOrCreate([
            'name' => 'invitado',
            'guard_name' => 'web',
        ]);

        $invitado->syncPermissions([$viewIndex]);

        $confianza = Role::firstOrCreate([
            'name' => 'confianza',
            'guard_name' => 'web',
        ]);

        $confianza->syncPermissions([$viewIndex, $controlGastos]);

        Role::query()
            ->where('guard_name', 'web')
            ->where('name', '!=', 'confianza')
            ->each(fn (Role $role) => $role->revokePermissionTo($controlGastos));

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}

