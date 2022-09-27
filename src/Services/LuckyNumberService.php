<?php

declare(strict_types=1);

namespace App\Services;

class LuckyNumberService
{
    public function countLuckyNumbers(string $minNumber, string $maxNumber): int
    {
        $minNumber = intval($minNumber);
        $maxNumber = intval($maxNumber);

        $total = 0;

        for ($i = $minNumber; $i <= $maxNumber; $i++) {
            if ($this->isLucky(sprintf("%06d", $i))) {
                $total++;
            }
        }

        return $total;
    }

    private function isLucky(string $number) {
        $left3 = substr($number, 0, 3);
        $right3 = substr($number, 3, 3);
        return $this->countSum($left3) === $this->countSum($right3);
    }

    private function countSum(string $number): int
    {
        $sum = 0;
        for ($i = 0; $i < strlen($number); $i++) {
            $sum += intval($number[$i]);
        }

        if ($sum >= 10) {
            $sum = $this->countSum(strval($sum));
        }

        return $sum;
    }
}