<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['university_id','course_code','course_name'];

    public function university(){
        return $this->belongsTo(University::class,'university_id','id')->withDefault(['name' => '']);
    }
}
