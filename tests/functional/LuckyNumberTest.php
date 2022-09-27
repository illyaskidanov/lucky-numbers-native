<?php


namespace Functional;

use Codeception\Test\Unit;
use \FunctionalTester;

class LuckyNumberTest extends Unit
{

    protected FunctionalTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testCorrectNumberForm()
    {
        $this->tester->sendGet('/script.php', [
            'first' => '555555',
            'end' => '777777'
        ]);

        $this->tester->seeResponseCodeIs(200);
        $this->tester->seeResponseContains('24668');
    }

    public function testInvalidNumberForm()
    {
        $this->tester->sendGet('/script.php', [
            'first' => '000000',
            'end' => 'qwerty'
        ]);

        $this->tester->seeResponseContains("The end number must have a format 'XXXXXX'");
    }

    public function testInvalidMaxLowerThanMinNumberForm()
    {
        $this->tester->sendGet('/script.php', [
            'first' => '999999',
            'end' => '111111'
        ]);

        $this->tester->seeResponseContains("The maximum number must be greater than the minimum");
    }
}
