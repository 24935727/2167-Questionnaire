<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Register as a user');

$I->amOnPage('/register');
$I->fillField('name', 'Test');
$I->fillField('email', 'test1@test.com');
$I->fillField('password', 'tester123');
$I->fillField('password_confirmation', 'tester123');
$I->click('register_button');

// $I->amOnPage('/');
$I->see('Dashboard');
