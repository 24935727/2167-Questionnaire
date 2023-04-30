<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Create a questionnaire');

$I->amOnPage('/login');
$I->fillField('email', 'test@test.com');
$I->fillField('password', 'password');
$I->seeInField('email', 'test@test.com');
$I->click('login_button');

$I->amOnPage('/');
$I->see('Dashboard');
$I->click('Create a Questionnaire');

$I->see('Title:');
$I->fillField('title', 'Example');
$I->click('Create Questionnaire');

$I->see('Create a text question');

// Can't go any further because of PHPBrowser limitations
