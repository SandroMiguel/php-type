<?php

/**
 * AbstractValidator
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
 * Abstract base class for specific validators.
 */
abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * Constructor.
     *
     * @param string $fieldName The name of the field being validated.
     * @param mixed $fieldValue The value of the field being validated.
     */
    public function __construct(
        protected readonly string $fieldName,
        protected readonly mixed $fieldValue,
    ) {
    }

    /**
     * Validate the field.
     */
    public function validate(): void
    {
        $this->specificValidation();
    }

    /**
     * Abstract method for specific validation.
     */
    abstract protected function specificValidation(): void;
}
