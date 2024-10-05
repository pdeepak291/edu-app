<?php

use App\Models\Access;
use App\Models\Company;


if (! function_exists('usermenus')) {
    function usermenus() {
        $roleid = auth()->user()->role_id;
        if(cache()->has('user-menus-'.$roleid)){
            $menus = cache()->get('user-menus-'.$roleid);
        }else{
            $menus = Access::where('role_id', auth()->user()->role_id)
                ->whereHas('menu', function ($query){
                    $query->where('menu_type', '=', 'navigation');
                })
                ->with('menu')->get();
            cache()->put('user-menus-'.$roleid,$menus);
        }
        return view('layout.menus',compact('menus'));
    }
}


if (! function_exists('haveaccess')) {
    function haveaccess($mid) {
        $menus = Access::where('role_id', auth()->user()->role_id)->where('menu_id',$mid)->get()->first();
        if($menus)
            return true;
        else
            return false;
    }
}

if (! function_exists('actionbuttons')) {
    function actionbuttons($mids) {
        $menus = Access::where('role_id', auth()->user()->role_id)
                ->whereIn('menu_id',$mids)
                ->whereHas('menu', function ($query){
                    $query->where('menu_type', '=', 'button');
                })
                ->with('menu')->get();

        return view('layout.buttons',compact('menus'));
    }
}

if (! function_exists('actionmenus')) {
    function actionmenus($mids,$id) {
        $menus = Access::where('role_id', auth()->user()->role_id)
        ->whereIn('menu_id',$mids)
        ->whereHas('menu', function ($query){
            $query->where('menu_type', '=', 'action');
        })
        ->with('menu')->get();

        return view('layout.actions',compact('menus','id'));
    }
}

if (! function_exists('settings_menus')) {
    function settings_menus() {
        $roleid = auth()->user()->role_id;
        if(cache()->has('user-settings-'.$roleid)){
            $menus = cache()->get('user-settings-'.$roleid);
        }else{
            $menus = Access::where('role_id', auth()->user()->role_id)
                ->whereHas('menu', function ($query){
                    $query->where('menu_type', '=', 'settings');
                })
                ->with('menu')->get();
            cache()->put('user-settings-'.$roleid,$menus);
        }
        return view('layout.menus',compact('menus'));
    }
}

if (!function_exists('getlogo')) {
    function getlogo() {
        $company = Company::find(1);
        if($company)
            return $company->logo;
        else
            return false;
    }
}