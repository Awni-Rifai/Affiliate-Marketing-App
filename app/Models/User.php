<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'image',
        'username',
        'referrer_id',
        'refers_number',

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
    ];
    protected $appends=['referral_link'];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }


    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->username]);
    }
    public static function getReferredUsersInTime($timeINDays,$user){

        $time = date('Y-m-d',strtotime(-$timeINDays." days"));
        return User::where('referrer_id',$user->id)->whereDate('created_at', ">=" , $time)->get();


    }
    public static function getReferredUserCountINPeriod($timeINDays,$user){
        $usersCount=[];
        $dates=[];
        for ($i=0;$i<$timeINDays;$i++){
            $time = date('Y-m-d',strtotime(-$i." days"));
             $count=User::where('referrer_id',$user->id)->whereDate('created_at', "=" , $time)->count();
             $usersCount[]=$count;
             $date[]=substr($time,6,5);

        }
        return [$usersCount,$date];

    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public static function updateRefererCount($id){
        $user=(User::find($id));
        $user->refers_number=$user->refers_number?$user->refers_number+1:1;
        $user->update();
    }
}
