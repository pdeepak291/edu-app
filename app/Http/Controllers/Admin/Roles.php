<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleSaveRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Access;
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

    public function save(RoleSaveRequest $request){
        try {
            $role = Role::create([
                'role_name' => $request->role_name
            ]);

            if($role){
                foreach($request->menu_list as $menu_id){
                    $access = Access::create([
                        'role_id' => $role->id,
                        'menu_id' => $menu_id
                    ]);
                }
                return redirect()->route('role.add')->with('success', 'Role created successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to create role.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create role.');
        }
    }

    public function edit($rid){
        try {
            $menus = Menu::where('parent_id',0)->with('submenus')->get();
            $role = Role::findOrFail(decrypt($rid));
            $access = Access::where('role_id',decrypt($rid))->get()->toArray();

            return view('admin.role.edit',compact('menus','role','access'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve role.');
        }
    }

    public function update(RoleUpdateRequest $request){
        try {
            $role_id = decrypt($request->role_id);
            $role = Role::findOrFail($role_id);

            if($role->update(['role_name' => $request->role_name])){
                Access::where('role_id',$role_id)->delete();
                foreach($request->menu_list as $menu_id){
                    $access = Access::create([
                        'role_id' => $role->id,
                        'menu_id' => $menu_id
                    ]);
                }
                return redirect()->route('roles')->with('success', 'Role update successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to update role.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update role.');
        }
    }
}
