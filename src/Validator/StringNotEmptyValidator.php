<?php

/**
 * StringNotEmptyValidator
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
 * Validator for ensuring that a field is not empty.
 */
final class StringNotEmptyValidator extends AbstractValidator
{
    /**
     * Validate that the field is not empty.
     *
     * @throws \PhpType\Exception\EmptyStringFieldException If the field is
     *  empty.
     */
    public function specificValidation(): void
    {
        if ($this->fieldValue === '') {
            throw new \PhpType\Exception\EmptyStringFieldException(
                $this->fieldName
            );
        }
    }
}