<?php

/**
 * IsIntValidator
 *
 * @package PhpType
 * @license MIT https://github.com/SandroMiguel/php-type/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-type
 */

declare(strict_types=1);

namespace PhpType\Validator;

/**
 * Validator for ensuring that a field is an integer.
 */
final class IsIntValidator extends AbstractValidator
{
    /**
     * Validate that the field is an integer.
     *
     * @throws \PhpType\Exception\NonIntegerFieldException If the field is
     *  not an integer.
     */
    public function specificValidation(): void
    {
        if (!\is_int($this->fieldValue)) {
            throw new \PhpType\Exception\NonIntegerFieldException(
                $this->fieldName
            );
        }
    }
}
