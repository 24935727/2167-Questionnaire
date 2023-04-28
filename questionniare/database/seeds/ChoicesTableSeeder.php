<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->insert([
            ['id' => '1', 'question_id' => '1', 'choice' => 'Very Familiar'],
            ['id' => '2', 'question_id' => '1', 'choice' => 'Somewhat Familiar'],
            ['id' => '3', 'question_id' => '1', 'choice' => 'Not Very Familiar'],
            ['id' => '4', 'question_id' => '1', 'choice' => 'Not At All Familiar'],
            ['id' => '5', 'question_id' => '2', 'choice' => 'To collect data for a study'],
            ['id' => '6', 'question_id' => '2', 'choice' => 'To evaluate a program'],
            ['id' => '7', 'question_id' => '2', 'choice' => 'To gather feedback from responders'],
            ['id' => '8', 'question_id' => '3', 'choice' => 'Length of questionnaire'],
            ['id' => '9', 'question_id' => '3', 'choice' => 'Clarity of questions'],
            ['id' => '10', 'question_id' => '3', 'choice' => 'Choices of response'],
            ['id' => '11', 'question_id' => '3', 'choice' => 'Apperance'],
        ]);
    }
}
