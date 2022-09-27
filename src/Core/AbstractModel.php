<?php

declare(strict_types=1);

namespace App\Core;

abstract class AbstractModel
{
    /**
     * @var string[]
     */
    private array $validationErrors = [];

    public function rules(): array
    {
        return [];
    }

    public function addValidationError($message): void
    {
        $this->validationErrors[] = $message;
    }

    public function getValidationErrors(): array
    {
        return $this->validationErrors;
    }
}