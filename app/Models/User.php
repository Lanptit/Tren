<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'userId';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'userName', 'email', 'password', 'prefGender', 'prefBrands'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ]; 

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }   

    public function is($roleName)
    {
        if($this->role->slug == $roleName)
        {
            return true;
        }
        return false;
    } 

    public static function add($input)
    {
        $user = new User;
        $user->userId = $input['dev'];
        $user->prefGender = $input['gender'];
        $user->prefBrands = $input['brands'];
        $user->role_id = 2;
        $user->save();
    }

    public function collections()
    {
        return $this->hasMany('App\Model\Collection', 'ownerId', 'userId');
    }
 
}
