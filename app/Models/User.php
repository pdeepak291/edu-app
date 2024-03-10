<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'gender',
        'dob',
        'mobile',
        'email',
        'image',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getStatusTextAttribute(){
        if($this->status=='1') return "Active";
        else return "Inactive";
    }

    public function getDobFormattedAttribute(){
        if($this->dob != NULL)
            return date('d/m/Y',strtotime($this->dob));
        return false;
    }
    
    protected $appends = ['status_text','dob_formatted'];

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id')->withDefault(['name' => '']);
    }
}
