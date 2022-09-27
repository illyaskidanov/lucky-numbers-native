<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\AbstractModel;

class FormModel extends AbstractModel
{
    public string $first;

    public string $end;

    public function __construct(string $first, string $end)
    {
        $this->first = $first;
        $this->end = $end;
    }

    public function rules(): array
    {
        return [
            'first' => [[$this, 'validateNumberFormat']],
            'end' => [[$this, 'validateNumberFormat'], [$this, 'validateMinLessThanMax']]
        ];
    }

    public function validateNumberFormat(string $attribute, FormModel $model): bool
    {
        if (!preg_match('/^\d{5}[1-9]$/', $model->$attribute)) {
            $this->addValidationError("The $attribute number must have a format 'XXXXXX'");
            return false;
        }
        return true;
    }

    public function validateMinLessThanMax(string $attribute, FormModel $model): bool
    {
        if (intval($model->first) > intval($model->end)) {
            $this->addValidationError("The maximum number must be greater than the minimum");
            return false;
        }
        return true;
    }
}