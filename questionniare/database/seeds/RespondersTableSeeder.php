<?php

use Illuminate\Database\Seeder;

class RespondersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responders')->insert([
        ['id' => '1', 'questionnaire_id' => '1', 'name' => 'Responder', 'email' => 'responder@test.com']
        ]);
    }
}
