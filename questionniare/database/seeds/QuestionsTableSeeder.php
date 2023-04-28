<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            ['id' => '1', 'questionnaire_id' => '1', 'question' => 'How familiar are you with questionnaire design in research?', 'type' => 'multiChoice'],
            ['id' => '2', 'questionnaire_id' => '1', 'question' => 'What question type is the most important in questionnaire design?', 'type' => 'multiChoice'],
            ['id' => '3', 'questionnaire_id' => '1', 'question' => 'What is the most important aspect of questionnaire design?', 'type' => 'multiChoice'],
            ['id' => '4', 'questionnaire_id' => '1', 'question' => 'What do you think is the most overlooked aspect of questionnaire design?', 'type' => 'open'],
            ['id' => '5', 'questionnaire_id' => '1', 'question' => 'What is the first step you take when designing a questionnaire?', 'type' => 'open'],
            ]);
    }
}
