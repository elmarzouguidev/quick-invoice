<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Roles\RolesEnumAdmin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $allPermissions = [

        ['name' => 'users.browse', 'guard_name' => 'web'],
        ['name' => 'users.read', 'guard_name' => 'web'],
        ['name' => 'users.create', 'guard_name' => 'web'],
        ['name' => 'users.edit', 'guard_name' => 'web'],
        ['name' => 'users.delete', 'guard_name' => 'web'],

        ['name' => 'invoices.browse', 'guard_name' => 'web'],
        ['name' => 'invoices.read', 'guard_name' => 'web'],
        ['name' => 'invoices.create', 'guard_name' => 'web'],
        ['name' => 'invoices.edit', 'guard_name' => 'web'],
        ['name' => 'invoices.delete', 'guard_name' => 'web'],

        ['name' => 'estimates.browse', 'guard_name' => 'web'],
        ['name' => 'estimates.read', 'guard_name' => 'web'],
        ['name' => 'estimates.create', 'guard_name' => 'web'],
        ['name' => 'estimates.edit', 'guard_name' => 'web'],
        ['name' => 'estimates.delete', 'guard_name' => 'web'],

        ['name' => 'contacts.browse', 'guard_name' => 'web'],
        ['name' => 'contacts.read', 'guard_name' => 'web'],
        ['name' => 'contacts.create', 'guard_name' => 'web'],
        ['name' => 'contacts.edit', 'guard_name' => 'web'],
        ['name' => 'contacts.delete', 'guard_name' => 'web'],

        ['name' => 'settings.browse', 'guard_name' => 'web'],
        ['name' => 'settings.read', 'guard_name' => 'web'],
        ['name' => 'settings.create', 'guard_name' => 'web'],
        ['name' => 'settings.edit', 'guard_name' => 'web'],
        ['name' => 'settings.delete', 'guard_name' => 'web'],

    ];

    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = collect($this->allPermissions);

        /*Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();*/

        Permission::insert($permissions->toArray());

        $adminRole = Role::whereName(RolesEnumAdmin::ADMIN->value)->first();

        $adminRole->syncPermissions(Permission::all());
    }
}
