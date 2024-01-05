<?php

/**
 * IsBoolValidator
 *
 * @package PhpType
 * @license MIT https://github.com/SandroMiguel/php-type/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-type
 */

declare(strict_types=1);

namespace PhpType\Validator;

/**
 * Validator for ensuring that a field is a boolean.
 */
final class IsBoolValidator extends AbstractValidator
{
    /**
     * Validate that the field is a boolean.
     *
     * @throws \PhpType\Exception\NonBooleanFieldException If the field is
     *  not a boolean.
     */
    public function specificValidation(): void
    {
        if (!\is_bool($this->fieldValue)) {
            throw new \PhpType\Exception\NonBooleanFieldException(
                $this->fieldName
            );
        }
    }
}
