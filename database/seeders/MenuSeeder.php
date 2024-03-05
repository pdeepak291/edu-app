<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'parent_id' => 0,
            'menu_title' => 'Dashboard',
            'menu_icon' => 'mdi-desktop-mac-dashboard',
            'menu_class' => null,
            'menu_route' => 'admin.home',
            'menu_category' => 'admin',
            'menu_type' => 'navigation',
            'menu_order' => 5,
        ]);
        Menu::create([
            'parent_id' => 0,
            'menu_title' => 'Roles',
            'menu_icon' => 'mdi-view-grid',
            'menu_class' => null,
            'menu_route' => 'roles',
            'menu_category' => 'admin',
            'menu_type' => 'navigation',
            'menu_order' => 10,
        ]);
        Menu::create([
            'parent_id' => 2,
            'menu_title' => 'Add Role',
            'menu_icon' => null,
            'menu_class' => 'btn-primary',
            'menu_route' => 'role.add',
            'menu_category' => 'admin',
            'menu_type' => 'button',
            'menu_order' => 1,
        ]);
        Menu::create([
            'parent_id' => 2,
            'menu_title' => 'View',
            'menu_icon' => 'mdi-magnify-plus',
            'menu_class' => 'text-info',
            'menu_route' => 'role.view',
            'menu_category' => 'admin',
            'menu_type' => 'action',
            'menu_order' => 2,
        ]);
        Menu::create([
            'parent_id' => 2,
            'menu_title' => 'Edit',
            'menu_icon' => 'mdi-pencil',
            'menu_class' => 'text-success',
            'menu_route' => 'role.edit',
            'menu_category' => 'admin',
            'menu_type' => 'action',
            'menu_order' => 3,
        ]);
        Menu::create([
            'parent_id' => 2,
            'menu_title' => 'Delete',
            'menu_icon' => 'mdi-delete',
            'menu_class' => 'text-danger',
            'menu_route' => 'role.delete',
            'menu_category' => 'admin',
            'menu_type' => 'action',
            'menu_warning' => 'Y',
            'menu_order' => 4,
        ]);
        Menu::create([
            'parent_id' => 0,
            'menu_title' => 'Users',
            'menu_icon' => 'mdi-account-group',
            'menu_class' => null,
            'menu_route' => 'users',
            'menu_category' => 'admin',
            'menu_type' => 'navigation',
            'menu_order' => 15,
        ]);
        Menu::create([
            'parent_id' => 7,
            'menu_title' => 'Add User',
            'menu_icon' => null,
            'menu_class' => 'btn-primary',
            'menu_route' => 'user.add',
            'menu_category' => 'admin',
            'menu_type' => 'button',
            'menu_order' => 1,
        ]);
        Menu::create([
            'parent_id' => 7,
            'menu_title' => 'View',
            'menu_icon' => 'mdi-magnify-plus',
            'menu_class' => 'text-info',
            'menu_route' => 'user.view',
            'menu_category' => 'admin',
            'menu_type' => 'action',
            'menu_order' => 2,
        ]);
        Menu::create([
            'parent_id' => 7,
            'menu_title' => 'Edit',
            'menu_icon' => 'mdi-pencil',
            'menu_class' => 'text-success',
            'menu_route' => 'user.edit',
            'menu_category' => 'admin',
            'menu_type' => 'action',
            'menu_order' => 3,
        ]);
        Menu::create([
            'parent_id' => 7,
            'menu_title' => 'Delete',
            'menu_icon' => 'mdi-delete',
            'menu_class' => 'text-danger',
            'menu_route' => 'user.delete',
            'menu_category' => 'admin',
            'menu_type' => 'action',
            'menu_warning' => 'Y',
            'menu_order' => 4,
        ]);
    }
}
