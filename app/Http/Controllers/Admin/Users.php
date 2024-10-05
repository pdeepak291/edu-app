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

class Users extends Controller
{
    public function login(){
        if(auth()->user()){
            return redirect()->route('admin.home');
        }else{
            return view('admin.login');
        }
    }

    public function logaction(UserLoginRequest $request){
        $input = ['email'=>$request->email,'password'=>$request->password];
        if(auth()->attempt($input)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('msg','Invalid Username or Password');
        }
    }

    public function home(){
        return view('admin.home');
    }

    public function profile(){
        return view('admin.profile');
    }
    
    public function settings(){
        return view('admin.settings.settings');
    }

    public function logout(){
        auth()->logout();
        Cache::flush();
        return redirect()->route('admin.login');
    }

    public function report(UsersDataTable $dataTable){
        return $dataTable->render('admin.user.report');
    }

    public function add(){
        $roles = Role::orderBy('role_name')->get();

        return view('admin.user.add',compact('roles'));
    }

    public function save(UserSaveRequest $request){
        try {
            $filename="user.jpg";
            if($request->file('image')){
                $manager = new ImageManager(new Driver);
                $filename = 'photo_'.time().'.'.$request->file('image')->getClientOriginalExtension();
                $img = $manager->read($request->file('image'));
                $img->save(storage_path('app/public/uploads/user/photo/'.$filename));
                $img = $img->resize(150,150);
                $img->save(storage_path('app/public/uploads/user/photo/thumb/'.$filename));
            }

            $user = User::create([
                'name' => $request->name,
                'role_id' => $request->role,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'image' => $filename,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => bcrypt($request->mobile),
            ]);
            
            if($user){
                return redirect()->route('user.add')->with('success', 'User created successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to create User.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create User.');
        }
    }

    public function view($uid){
        $user = User::find(decrypt($uid));

        return view('admin.user.view',compact('user'));
    }

    public function edit($uid){
        $user = User::find(decrypt($uid));
        $roles = Role::orderBy('role_name')->get();

        return view('admin.user.edit',compact('user','roles'));
    }

    public function update(UserUpdateRequest $request){
        try {
            $filename="user.jpg";
        /*    if($request->file('image')){
                $manager = new ImageManager(new Driver);
                $filename = 'photo_'.time().'.'.$request->file('image')->getClientOriginalExtension();
                $img = $manager->read($request->file('image'));
                $img->save(storage_path('app/public/uploads/user/photo/'.$filename));
                $img = $img->resize(150,150);
                $img->save(storage_path('app/public/uploads/user/photo/thumb/'.$filename));
            }*/
            $user = User::find(decrypt($request->user_id));
            if($user){
                $update = $user->update([
                    'name' => $request->name,
                    'role_id' => $request->role,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'image' => $filename,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'password' => bcrypt($request->mobile),
                ]);
                if($update){
                    return redirect()->route('users')->with('success', 'User updated successfully.');
                }else{
                    return redirect()->back()->withInput()->with('error', 'Failed to update User.');
                }
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to update User.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update User.');
        }
    }

    public function delete($uid){
        try {
            $user = User::findOrFail(decrypt($uid));
            if($user && $user->delete()){
                return redirect()->route('users')->with('success', 'User deleted successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to delete User.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve User.');
        }
    }
    
}
