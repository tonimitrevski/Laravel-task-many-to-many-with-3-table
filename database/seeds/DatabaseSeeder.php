<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $toDelete = [
        'users',
        'roles',
        'organisations',
        'clients'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->toDelete as $table) :
            DB::table($table)->delete();
        endforeach;

        $this->call(UsersTableSeeder::class);
        $this->command->info('User table seeded!');

        $this->call(RolesTableSeeder::class);
        $this->command->info('Role table seeded!');

        $this->call(OrganisationsTableSeeder::class);
        $this->command->info('Organisation table seeded!');

        $this->call(ClientsTableSeeder::class);
        $this->command->info('Client table seeded!');


        $this->call(RelationOrgUsrRoleTableSeeder::class);
        $this->command->info('Relation Organisation role User table seeded!');

        $this->call(OrgClientsRoleTableSeeder::class);
        $this->command->info('Relation Organisation clients table seeded!');


    }
}
