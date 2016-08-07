<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    //Permet de voir si un user a un role, permettra de determiner si l'user peut avoir acces ou pas
    public function userAUnRole($roles)
    {
        if(is_array($roles))
        {
            foreach ($roles as $role){
                if($this->aUnRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->aUnRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function aUnRole($role)
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
        }
        return false;
    }


}
