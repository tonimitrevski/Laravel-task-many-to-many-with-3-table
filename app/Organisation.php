<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_organisation_roles');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_organisation_roles');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'organisation_clients');
    }
}
