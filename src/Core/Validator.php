<?php

declare(strict_types=1);

namespace App\Core;

class Validator
{
    /**
     * @param AbstractModel $model
     * @return bool
     */
    public function validate(AbstractModel $model): bool
    {
        $isModelValid = true;

        foreach ($model->rules() as $attribute => $ruleSet) {
            /** @var callable[] $ruleSet */
            foreach ($ruleSet as $rule) {
                $isValid = call_user_func($rule, $attribute, $model);
                if (! $isValid) {
                    $isModelValid = false;
                }
            }
        }

        return $isModelValid;
    }
}