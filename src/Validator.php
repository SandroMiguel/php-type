<?php

/**
 * Validator
 *
 * @package PhpType
 * @license MIT https://github.com/SandroMiguel/php-type/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @copyright 2023 Sandro
 * @link https://github.com/SandroMiguel/php-type
 */

declare(strict_types=1);

namespace PhpType;

use PhpType\Validator\IsIntValidator;
use PhpType\Validator\IsStringValidator;
use PhpType\Validator\NotNullValidator;
use PhpType\Validator\StringNotEmptyValidator;

/**
 * Type validator.
 */
final class Validator
{
    /** @var string The name of the field being validated. */
    private string $fieldName;

    /** @var mixed The value of the field as a mixed type. */
    private mixed $fieldValue;

    /** @var string The value of the field as a string. */
    private $stringValue;

    /** @var int The value of the field as an integer. */
    private $intValue;

    /** @var string|null The value of the field as a string or null. */
    private $stringValueOrNull;

    /** @var int|null The value of the field as an integer or null. */
    private $intValueOrNull;

    /**
     * Constructor.
     *
     * @param string $fieldName The name of the field being validated.
     * @param mixed $fieldValue The value of the field being validated.
     */
    private function __construct(string $fieldName, mixed $fieldValue)
    {
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldValue;
        $this->stringValue = $fieldValue;
        $this->intValue = $fieldValue;
        $this->stringValueOrNull = $fieldValue;
        $this->intValueOrNull = $fieldValue;
    }

    /**
     * Start the validation chain for a field.
     *
     * @param string $fieldName The name of the field being validated.
     * @param mixed $fieldValue The value of the field being validated.
     *
     * @return Validator The Validator instance for chaining.
     */
    public static function validate(string $fieldName, mixed $fieldValue): self
    {
        return new self($fieldName, $fieldValue);
    }

    /**
     * Check if the string is not empty.
     *
     * @return Validator The Validator instance for chaining.
     */
    public function stringNotEmpty(): self
    {
        $validator = new StringNotEmptyValidator(
            $this->fieldName,
            $this->fieldValue
        );
        $validator->validate();

        return $this;
    }

    /**
     * Get the integer value.
     *
     * @return int The integer value.
     */
    public function getIntValue(): int
    {
        $this->validateNotNull();
        $this->validateIsInt();

        return $this->intValue;
    }

    /**
     * Get the integer value or null.
     *
     * @return int|null The integer value or null.
     */
    public function getIntValueOrNull(): ?int
    {
        if ($this->fieldValue !== null) {
            $this->validateIsInt();
        }

        return $this->intValueOrNull;
    }

    /**
     * Get the string value.
     *
     * @return string The string value.
     */
    public function getStringValue(): string
    {
        $this->validateNotNull();
        $this->validateIsString();

        return $this->stringValue;
    }

    /**
     * Get the string value or null.
     *
     * @return string|null The string value or null.
     */
    public function getStringValueOrNull(): ?string
    {
        if ($this->fieldValue !== null) {
            $this->validateIsString();
        }

        return $this->stringValueOrNull;
    }

    /**
     * Get the mixed value.
     *
     * @return mixed The mixed value.
     */
    public function getValue(): mixed
    {
        $this->validateNotNull();

        return $this->fieldValue;
    }

    /**
     * Check if the field is an integer.
     *
     * @return Validator The Validator instance for chaining.
     */
    private function validateIsInt(): self
    {
        $validator = new IsIntValidator($this->fieldName, $this->fieldValue);
        $validator->validate();

        return $this;
    }

    /**
     * Check if the field is a string.
     *
     * @return Validator The Validator instance for chaining.
     */
    private function validateIsString(): self
    {
        $validator = new IsStringValidator($this->fieldName, $this->fieldValue);
        $validator->validate();

        return $this;
    }

    /**
     * Check if the field is not null.
     *
     * @return Validator The Validator instance for chaining.
     */
    private function validateNotNull(): self
    {
        $validator = new NotNullValidator($this->fieldName, $this->fieldValue);
        $validator->validate();

        return $this;
    }
}
