<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

use App\Models\Company;

class Settings extends Controller
{
    public function index(){
        $company = Company::find(1);

        return view('admin.settings.home',compact('company'));
    }

    public function update(Request $request){

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'logo' => 'required|image',
            'gstno' => 'nullable'
        ]);

        try {
            $filename="logo.jpg";
            if($request->file('logo')){
                $manager = new ImageManager(new Driver);
                $filename = 'logo_'.time().'.'.$request->file('logo')->getClientOriginalExtension();
                $img = $manager->read($request->file('logo'));
                $img->save(storage_path('app/public/uploads/company/logo/'.$filename));
            }
            $company = Company::find(1);
            if($company){
                $update = $company->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'logo' => $filename,
                    'gstno' => $request->gstno
                ]);
                if($update){
                    return redirect()->route('admin.settings')->with('success', 'Company updated successfully.');
                }else{
                    return redirect()->back()->withInput()->with('error', 'Failed to update Company.');
                }
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to update Company.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
