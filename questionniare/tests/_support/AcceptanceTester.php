<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */
    public function login()

    {
    
         // if snapshot exists - skipping login
    
         if ($I->loadSessionSnapshot('login')) return;
    
          // logging in
    
         $I->amOnPage('/login');
    
         $I->fillField('email', 'test@test.com');
    
         $I->fillField('password', 'tester12');
    
         $I->click('Login');
    
          // saving snapshot
    
         $I->saveSessionSnapshot('login');
    
    }

}
