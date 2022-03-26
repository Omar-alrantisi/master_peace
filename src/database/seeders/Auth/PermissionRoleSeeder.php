<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => 1,
            'type' => User::TYPE_ADMIN,
            'name' => 'Administrator',
        ]);

        // Non Grouped Permissions
        //

        // Grouped permissions
        // Users category
        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'sort' => 6,
            ]),
        ]);

        // Assign Permissions to other Roles
        //
        //category
        $language = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.category',
            'description' => __('All Category Permissions'),
        ]);

        $language->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.category.list',
                'description' => __('View Category'),
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.category.store',
                'description' => __('Create Category'),
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.category.update',
                'description' => __('Update Category'),
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.category.delete',
                'description' => __('Delete Category'),
                'sort' => 4,
            ]),
        ]);
        //city
        $language = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.city',
            'description' => __('All City Permissions'),
        ]);

        $language->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.city.list',
                'description' => __('View City'),
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.city.store',
                'description' => __('Create City'),
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.city.update',
                'description' => __('Update City'),
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.city.delete',
                'description' => __('Delete City'),
                'sort' => 4,
            ]),
        ]);

        //city
        $language = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.worker',
            'description' => __('All Worker Permissions'),
        ]);

        $language->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.worker.list',
                'description' => __('View Worker'),
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.worker.store',
                'description' => __('Create Worker'),
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.worker.update',
                'description' => __('Update Worker'),
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.worker.delete',
                'description' => __('Delete Worker'),
                'sort' => 4,
            ]),
        ]);

        $this->enableForeignKeys();
    }
}
