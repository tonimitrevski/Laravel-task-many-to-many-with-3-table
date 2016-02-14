<?php

use Illuminate\Database\Seeder;

class OrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisations = [
            [
                'name' => 'google',
            ],
            [
                'name' => 'yahoo',
            ],
            [
                'name' => 'microsoft',
            ],
        ];

        foreach ($organisations as $organisation) {
            \App\Organisation::create($organisation);
        }
    }
}
