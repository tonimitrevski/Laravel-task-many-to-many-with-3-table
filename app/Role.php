<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_organisation_roles');
    }

    public function organisations()
    {
        return $this->belongsToMany(Role::class, 'users_organisation_roles');
    }
}
