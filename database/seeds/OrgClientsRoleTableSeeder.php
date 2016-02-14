<?php

use Illuminate\Database\Seeder;

class OrgClientsRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;

        while (true) :
            $count++;
            if ($count > 10) :
                break;
            else :
                \App\OrganisationClients::create([
                    'client_id' => \App\Client::all()->random()->id,
                    'organisation_id' => \App\Organisation::all()->random()->id,
                ]);
            endif;
        endwhile;
    }
}
