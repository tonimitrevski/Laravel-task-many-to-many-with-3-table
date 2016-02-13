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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function organisations()
    {
        return $this->belongsToMany(Organisation::class, 'users_organisation_roles');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_organisation_roles');
    }


    public function clients()
    {
        return $this->hasMany(Client::class, 'creator_user_id');
    }

    public static function roleOwner()
    {
        return Role::whereName('owner')->first();
    }

    /*All Organisation in user*/
    public function organisationsOwner()
    {
        return $this->organisations()->wherePivot('role_id', self::roleOwner()->id);
    }










}
