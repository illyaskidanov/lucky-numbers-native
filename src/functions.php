<?php

use App\Core\AbstractModel;
use App\Core\Validator;

if (! function_exists('response')) {
    function response(array $data)
    {
        echo json_encode($data);
        die();
    }
}

if (! function_exists('responseWithErrors')) {
    function responseWithErrors(array $errorMessages)
    {
        http_response_code(500);
        echo json_encode(['errors' => $errorMessages]);
        die();
    }
}

if (! function_exists('validate')) {
    function validate(AbstractModel $model): bool
    {
        static $validator = null;
        if (is_null($validator)) {
            $validator = new Validator();
        }
        return $validator->validate($model);
    }
}