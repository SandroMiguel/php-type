<?php

/**
 * ValidatorTest
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

namespace PhpType\Tests;

use PhpType\Exception\EmptyStringFieldException;
use PhpType\Exception\NonIntegerFieldException;
use PhpType\Exception\NonStringFieldException;
use PhpType\Exception\NullFieldException;
use PhpType\Validator;
use PHPUnit\Framework\TestCase;

/**
 * Test class for the Validator class.
 */
final class ValidatorTest extends TestCase
{

    /**
     * Test getIntValue() returns validated integer.
     */
    public function testGetIntValueReturnsValidatedInteger(): void
    {
        $validatedInt = Validator::validate('fieldName', 123)
            ->getIntValue();

        $this->assertEquals(123, $validatedInt);
    }

    /**
     * Test getIntValue() throws exception for non-integer field.
     */
    public function testGetIntValueThrowsExceptionForNonIntegerField(): void
    {
        $this->expectException(NonIntegerFieldException::class);

        Validator::validate('fieldName', 'stringValue')
            ->getIntValue();
    }

    /**
     * Test getIntValue() throws exception for null field.
     */
    public function testGetIntValueThrowsExceptionForNullField(): void
    {
        $this->expectException(NullFieldException::class);

        Validator::validate('fieldName', null)
            ->getIntValue();
    }

    /**
     * Test getIntValueOrNull() returns validated int for non-empty integer.
     */
    public function testGetIntValueOrNullReturnsValidatedIntForNonEmptyInteger()
    {
        $validatedInt = Validator::validate('fieldName', 123)
            ->getIntValueOrNull();

        $this->assertEquals(123, $validatedInt);
    }

    /**
     * Test getIntValueOrNull() returns null for null field.
     */
    public function testGetIntValueOrNullReturnsNullForNullField()
    {
        $validatedInt = Validator::validate('fieldName', null)
            ->getIntValueOrNull();

        $this->assertNull($validatedInt);
    }

    /**
     * Test getIntValueOrNull() throws exception for non-integer field.
     */
    public function testGetIntValueOrNullThrowsExceptionForNonIntegerField()
    {
        $this->expectException(NonIntegerFieldException::class);

        Validator::validate('fieldName', 'stringValue')
            ->getIntValueOrNull();
    }

    /**
     * Test if the stringNotEmpty() method of the Validator class
     * correctly validates a non-empty string.
     */
    public function testStringNotEmptyValidatesNonEmptyString(): void
    {
        $this->expectNotToPerformAssertions();

        Validator::validate('fieldName', 'nonEmptyString')
            ->stringNotEmpty();
    }

    /**
     * Test if the stringNotEmpty() method of the Validator class
     * correctly throws an exception for an empty string.
     */
    public function testStringNotEmptyThrowsExceptionForEmptyString(): void
    {
        $this->expectException(EmptyStringFieldException::class);

        Validator::validate('fieldName', '')
            ->stringNotEmpty();
    }

    /**
     * Test getStringValueOrNull() returns validated string for non-empty string.
     */
    public function testGetStringValueOrNullReturnsValidatedStringForNonEmptyString()
    {
        $validatedString = Validator::validate('fieldName', 'stringValue')
            ->getStringValueOrNull();

        $this->assertEquals('stringValue', $validatedString);
    }

    /**
     * Test getStringValueOrNull() returns null for null field.
     */
    public function testGetStringValueOrNullReturnsNullForNullField(): void
    {
        $validatedString = Validator::validate('fieldName', null)
            ->getStringValueOrNull();

        $this->assertNull($validatedString);
    }

    /**
     * Test getStringValueOrNull() throws exception for non-string field.
     */
    public function testGetStringValueOrNullThrowsExceptionForNonStringField(): void
    {
        $this->expectException(NonStringFieldException::class);

        Validator::validate('fieldName', 123)
            ->getStringValueOrNull();
    }

    /**
     * Test if the getValue() method of the Validator class
     * returns the validated value.
     */
    public function testGetValueReturnsValidatedValue(): void
    {
        $validatedValue = Validator::validate('fieldName', 'stringValue')
            ->getValue();

        $this->assertEquals('stringValue', $validatedValue);
    }

    /**
     * Test if the getValue() method of the Validator class
     * throws an exception for a null value.
     */
    public function testGetValueThrowsExceptionForNullField(): void
    {
        $this->expectException(NullFieldException::class);

        Validator::validate('fieldName', null)
            ->getValue();
    }

    /**
     * Test if the getStringValue() method of the Validator class
     * returns the validated string.
     */
    public function testGetStringValueReturnsValidatedString(): void
    {
        $validatedString = Validator::validate('fieldName', 'stringValue')
            ->getStringValue();

        $this->assertEquals('stringValue', $validatedString);
    }

    /**
     * Test if the getStringValue() method of the Validator class
     * throws an exception for a non-string value.
     */
    public function testGetStringValueThrowsExceptionForNonStringField(): void
    {
        $this->expectException(NonStringFieldException::class);

        Validator::validate('fieldName', 123)
            ->getStringValue();
    }
}
