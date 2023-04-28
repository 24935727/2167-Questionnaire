<?php

use Illuminate\Database\Seeder;

class Multi_Choice_ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('multi_choice_responses')->insert([
            ['id' => '1', 'choice_id' => '1', 'question_id' => '1', 'responder_id'=> '1', 'questionnaire_id' => '1'],
            ['id' => '2', 'choice_id' => '5', 'question_id' => '2', 'responder_id'=> '1', 'questionnaire_id' => '1'],
            ['id' => '3', 'choice_id' => '8', 'question_id' => '3', 'responder_id'=> '1', 'questionnaire_id' => '1'],
        ]);
    }
}
