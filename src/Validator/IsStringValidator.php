<?php

/**
 * IsStringValidator
 *
 * PHP Version 8.0.5
 *
 * @package PhpType
 * @license MIT https://github.com/SandroMiguel/php-type/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @copyright 2023 Sandro
 * @link https://github.com/SandroMiguel/php-type
 */

declare(strict_types=1);

namespace PhpType\Validator;

/**
 * Validator for ensuring that a field is a string.
 */
final class IsStringValidator extends AbstractValidator
{
    /**
     * Validate that the field is a string.
     *
     * @throws \PhpType\Exception\NonStringFieldException If the field is
     *  not a string.
     */
    public function specificValidation(): void
    {
        if (!\is_string($this->fieldValue)) {
            throw new \PhpType\Exception\NonStringFieldException(
                $this->fieldName
            );
        }
    }
}
