<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Login');

$I->amOnPage('/login');
$I->fillField('email', 'example@example.com');
$I->fillField('password', 'password');
$I->seeInField('email', 'example@example.com');
$I->click('login_button');

$I->amOnPage('/');
$I->see('Dashboard');