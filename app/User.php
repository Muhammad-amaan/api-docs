<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Messagable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserUniqueID',
        'DesignationID',
        'Username',
        'Email',
        'Password',
        'Active',
        'Avatar',
    ];

    protected $table = 'users';

    protected $primaryKey = 'ID';

    /**
     * Fields that are type of dates
     * @var array
     */
//    protected $dates = ['last_login', 'dob'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * This mutator automatically hashes the password.
     *
     * @var string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }


    /**
     * Accessor for Created at attribute
     * @param $value
     * @return mixed
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toW3cString();
    }

    /**
     * Accessor for Updated at attribute
     * @param $value
     * @return mixed
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toW3cString();
    }


    
    /**
     * Each user has many device
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany('App\Device');
    }


    /**
     * User has only one setting.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function setting()
    {
        return $this->hasOne('App\Setting');
    }


    /**
     * Overide the model field to delete the related data of the user
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) { // before delete() method call this
            $user->setting()->delete();
            $user->devices()->delete();
            // do the rest of the cleanup...
        });
    }


}
