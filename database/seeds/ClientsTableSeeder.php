<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * UserTableSeeder constructor.
     * @param \Faker\Generator $faker
     */
    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }
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
            if ($count >=30) :
                break;
            else :
                \App\Client::create([
                    'name' => $this->faker->name,
                    'creator_user_id' => \App\User::all()->random()->id,
                ]);
            endif;
        endwhile;
    }
}
