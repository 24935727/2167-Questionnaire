<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Create a new questionnaire');

$I->amOnPage('/questionnaire/create');
$I->fillField('title', 'Test Questionnaire');
$I->click('Create Questionnaire');

$I->seeInDatabase('questionnaires', [
    'title' => 'Test Questionnaire',
]);
