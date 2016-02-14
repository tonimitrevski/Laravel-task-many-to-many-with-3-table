<?php

use Illuminate\Database\Seeder;

class RelationOrgUsrRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all()->toArray();
        $roles = \App\Role::all()->toArray();
        $organisations = \App\Organisation::all()->toArray();



        $count = 0;

        while (true) :
            $count++;
            if ($count > 2) :
                break;
            else :
                \App\UsersOrganisationRoles::create([
                    'user_id' => $users[$count - 1]['id'],
                    'organisation_id' => \App\Organisation::all()->random()->id,
                    'role_id' => $roles[$count - 1]['id'],

                ]);
            endif;
        endwhile;
    }
}
