<?php


namespace Unit\App\Services;

use App\Services\LuckyNumberService;
use Codeception\Test\Unit;
use \UnitTester;

class LuckyNumberServiceTest extends Unit
{

    protected UnitTester $tester;

    public function testCorrectNumbers()
    {
        $service = new LuckyNumberService();

        $this->assertEquals(110889, $service->countLuckyNumbers('000001', '999999'));
        $this->assertEquals(24668, $service->countLuckyNumbers('555555', '777777'));
        $this->assertEquals(0, $service->countLuckyNumbers('000001', '000001'));
        $this->assertEquals(1, $service->countLuckyNumbers('999999', '999999'));
    }
}
