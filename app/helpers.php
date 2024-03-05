<?php

use App\Models\Access;

if (! function_exists('usermenus')) {
    function usermenus() {
        $menus = Access::where('role_id', auth()->user()->role_id)
                ->whereHas('menu', function ($query){
                    $query->where('menu_type', '=', 'navigation');
                })
                ->with('menu')->get();

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