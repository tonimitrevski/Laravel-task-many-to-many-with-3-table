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


    /**
     * User Has Many Clients
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany(Client::class, 'creator_user_id');
    }

    /**
     * Role Owner
     * @return mixed
     */
    public static function roleOwner()
    {
        return Role::whereName('owner')->first();
    }

    /**
     * All Organisation where user is owner
     * @return mixed
     */
    public function organisationsOwner()
    {
        return $this->organisations()->wherePivot('role_id', self::roleOwner()->id);
    }

    /**
     * All Organisation where user is owner with clients
     * @return mixed
     */
    public function organisationsOwnerWithClients()
    {
        return $this->organisations()->wherePivot('role_id', self::roleOwner()->id)->with('clients');
    }

    /**
     * All Organisation in user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organisations()
    {
        return $this->belongsToMany(Organisation::class, 'users_organisation_roles');
    }


    /**
     * Determine all role user has for a all Organisation
     * @return $this
     */
    public function organisationsRoles()
    {
        return $this->belongsToMany(Role::class, 'users_organisation_roles')->withPivot('organisation_id');
    }

    /**
     * Determine which role a user has for a specific Organisation
     * @param $organisation_id
     * @return mixed
     */
    public function organisationRole($organisation_id)
    {
        return $this->belongsToMany(Role::class, 'users_organisation_roles')->wherePivot('organisation_id', $organisation_id)->first();
    }










}
