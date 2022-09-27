<?php

use App\Models\FormModel;
use App\Services\LuckyNumberService;

require __DIR__.'/../vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

$first = $_GET['first'];
$end = $_GET['end'];

$formModel = new FormModel($first, $end);
$isValid = validate($formModel);
if (! $isValid) {
    responseWithErrors($formModel->getValidationErrors());
}

$luckyNumberService = new LuckyNumberService();

$luckyNumberTicketsCount = $luckyNumberService->countLuckyNumbers($first, $end);

response(compact('luckyNumberTicketsCount'));