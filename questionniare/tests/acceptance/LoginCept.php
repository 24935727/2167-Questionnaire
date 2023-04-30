<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Login');

$I->amOnPage('/login');
$I->fillField('email', 'test@test.com');
$I->fillField('password', 'password');
$I->seeInField('email', 'test@test.com');
$I->click('login_button');

$I->amOnPage('/');
$I->see('Dashboard');