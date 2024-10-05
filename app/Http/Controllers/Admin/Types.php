<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserSaveRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

use DB;

class Types extends Controller
{
    public function report(){
        //$types = Type::orderBy('type')->get();
        return view('admin.types.type_report');
    }

    public function add(){
        $tepe = Role::orderBy('type')->get();

        return view('admin.types.type_add',compact('roles'));
    }

    public function save(TypeSaveRequest $request){
        try {
            

            $type = Type::create([
                'name' => $request->name,
                'category_id' => $request->category,
                'rate' => $request->rate,
            ]);
            
            if($type){
                return redirect()->route('type.add')->with('success', 'Type created successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to create Type.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create Type.');
        }
    }

    public function view($tid){
        $type = Type::find($tid);

        return view('admin.type.view',compact('type'));
    }

    public function edit($tid){
        $type = Type::find($tid);
        $roles = Role::orderBy('role_name')->get();

        return view('admin.type.edit',compact('type','roles'));
    }

    public function update(TypeUpdateRequest $request){
        try {
            
            $type = Type::find(decrypt($request->type_id));
            if($type){
                $update = $type->update([
                    'name' => $request->name,
                    'category_id' => $request->category,
                    'amount' => $request->amount,
                ]);
                if($update){
                    return redirect()->route('types')->with('success', 'Type updated successfully.');
                }else{
                    return redirect()->back()->withInput()->with('error', 'Failed to update Type.');
                }
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to update Type.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update Type.');
        }
    }

    public function delete($tid){
        try {
            $type = Type::findOrFail(decrypt($tid));
            if($type && $type->delete()){
                return redirect()->route('types')->with('success', 'Types deleted successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to delete Types.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve Types.');
        }
    }
    
}
