<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersOrganisationRoles extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_organisation_roles';


    protected $fillable = [
        'user_id', 'organisation_id', 'role_id',
    ];


    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            if(self::organisationHasOwner($model->organisation_id)) {
                return false;
            }
        });
        static::updating(function($model)
        {
            if(self::organisationHasOwner($model->organisation_id)) {
                return false;
            }
        });
    }

    public static function organisationHasOwner($id) {
        $relations = self::where('organisation_id', $id)->lists('role_id');
        $owner = User::roleOwner();

        if($relations) {
            foreach($relations as $relation) {
                if($relation == $owner->id) {
                    session()->flash('hasOwner', 'It\'s not allowed to have multiple owner on this organisation');
                    return true;
                }
            }
        }
    }
}
