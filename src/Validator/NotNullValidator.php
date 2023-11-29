<?php

/**
 * NotNullValidator
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
 * Validator for ensuring that a field is not null.
 */
final class NotNullValidator extends AbstractValidator
{
    /**
     * Validate that the field is not null.
     *
     * @throws \PhpType\Exception\NullFieldException If the field is null.
     */
    public function specificValidation(): void
    {
        if ($this->fieldValue === null) {
            throw new \PhpType\Exception\NullFieldException($this->fieldName);
        }
    }
}
