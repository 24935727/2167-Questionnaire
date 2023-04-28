<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(QuestionnairesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(ChoicesTableSeeder::class);
        $this->call(RespondersTableSeeder::class);
        $this->call(Multi_Choice_ResponsesTableSeeder::class);
        $this->call(Open_ResponsesTableSeeder::class);


    }
}
