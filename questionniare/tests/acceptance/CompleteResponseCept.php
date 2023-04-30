<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Complete a questionnaire');

$I->amOnPage('/questionnaires/1/responses/create');


$I->click('#choice_1');
$I->click('#choice_5');
$I->click('#choice_9');
$I->fillField('#open_response_3', '1');
$I->fillField('#open_response_4', '1');
$I->fillField('#responder_name', 'Test');
$I->fillField('#responder_email', 'Test@Test.com');
$I->click('Submit');

$I->amOnPage('/questionnaires/responses/show');
$I->see('Thank you for taking the questionnaire');