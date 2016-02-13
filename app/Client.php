<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function organisations()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_clients');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }
}
