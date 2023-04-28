<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Complete a questionnaire');

$I->amOnPage('/questionnaires/1/responses/create');

$I->fillField('#openResponse_0', '1');
$I->click('#choice_0');
$I->fillField('#responder_name', 'Test');
$I->fillField('#responder_email', 'Test@Test.com');
$I->click('Submit');

$I->amOnPage('/questionnaires/responses/show');
$I->see('Thank you for taking the questionnaire');