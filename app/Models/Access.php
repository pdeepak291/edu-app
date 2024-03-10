<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = ['role_id','menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    static function have_access($id){
        
        $role_id = auth()->user()->role_id;
        $access = self::where('role_id',$role_id)->where('menu_id',$id)->get()->first();
        
        if(!empty($access)){
            return $access->id;
        }
        return false;
    }
}
