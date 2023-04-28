<?php

use Illuminate\Database\Seeder;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionnaires')->insert([
            ['id' => '1', 'user_id' => '1', 'title' => 'Questionnaire Design', 'ethics_statement' => 'yes', 'status' => 'live',]
        ]);
    }
}
