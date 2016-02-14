<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{

    /**
     * Many to Many Relationship with Organisation table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_organisation_roles');
    }

    /**
     * Many to Many Relationship with User table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_organisation_roles');
    }

    /**
     * Many to Many Relationship with Client table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'organisation_clients');
    }
}
