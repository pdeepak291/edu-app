<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

class Roles extends Controller
{
    public function report(){
        $roles = Role::orderBy('role_name')->paginate(5);

        return view('admin.role.report',compact('roles'));
    }

    public function add(){
        $menus = Menu::where('parent_id',0)->with('submenus')->get();

        return view('admin.role.add',compact('menus'));
    }
}
