<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/files/coins-test.sql');
        DB::connection('sqlite')->statement($sql);

        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            User::create([
                'username' => $faker->word . $index,
                'email' => $faker->email,
                'password' => 'secret'
            ]);
        }
    }
}
