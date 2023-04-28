<?php

use Illuminate\Database\Seeder;

class Open_ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('open_responses')->insert([
            ['id' => '1', 'response' => 'Response 1', 'question_id' => '4', 'responder_id' => '1', 'questionnaire_id' => '1'],
            ['id' => '2', 'response' => 'Response 2', 'question_id' => '5', 'responder_id' => '1', 'questionnaire_id' => '1']
            
        ]);
    }
}
