<?php

/**
 * ValidatorTest
 *
 * @package PhpType
 * @license MIT https://github.com/SandroMiguel/php-type/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @copyright 2023 Sandro
 * @link https://github.com/SandroMiguel/php-type
 */

declare(strict_types=1);

namespace PhpType\Tests;

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
        $this->expectException(
            \PhpType\Exception\NonIntegerFieldException::class
        );

        Validator::validate('fieldName', 'stringValue')
            ->getIntValue();
    }

    /**
     * Test getIntValue() throws exception for null field.
     */
    public function testGetIntValueThrowsExceptionForNullField(): void
    {
        $this->expectException(\PhpType\Exception\NullFieldException::class);

        Validator::validate('fieldName', null)
            ->getIntValue();
    }

    /**
     * Test getIntValueOrNull() returns validated int for non-empty integer.
     */
    public function testGetIntValueOrNullReturnsValidatedIntForNonEmptyInteger(): void
    {
        $validatedInt = Validator::validate('fieldName', 123)
            ->getIntValueOrNull();

        $this->assertEquals(123, $validatedInt);
    }

    /**
     * Test getIntValueOrNull() returns null for null field.
     */
    public function testGetIntValueOrNullReturnsNullForNullField(): void
    {
        $validatedInt = Validator::validate('fieldName', null)
            ->getIntValueOrNull();

        $this->assertNull($validatedInt);
    }

    /**
     * Test getIntValueOrNull() throws exception for non-integer field.
     */
    public function testGetIntValueOrNullThrowsExceptionForNonIntegerField(): void
    {
        $this->expectException(
            \PhpType\Exception\NonIntegerFieldException::class
        );

        Validator::validate('fieldName', 'stringValue')
            ->getIntValueOrNull();
    }

    /**
     * Test if the isBool() method of the Validator class
     * correctly validates a boolean.
     */
    public function testIsBoolValidatesBoolean(): void
    {
        $this->expectNotToPerformAssertions();

        Validator::validate('fieldName', true)
            ->getBoolValue();
    }

    /**
     * Test if the isBool() method of the Validator class
     * correctly throws an exception for a non-boolean value.
     */
    public function testIsBoolThrowsExceptionForNonBooleanValue(): void
    {
        $this->expectException(
            \PhpType\Exception\NonBooleanFieldException::class
        );

        Validator::validate('fieldName', 'nonBooleanValue')
            ->getBoolValue();
    }

    /**
     * Test if the isBoolOrNull() method of the Validator class
     * returns validated boolean for a boolean value.
     */
    public function testIsBoolOrNullReturnsValidatedBoolForBooleanValue(): void
    {
        $validatedBool = Validator::validate('fieldName', true)
            ->getBoolValueOrNull();

        $this->assertTrue($validatedBool);
    }

    /**
     * Test if the isBoolOrNull() method of the Validator class
     * returns null for a null field.
     */
    public function testIsBoolOrNullReturnsNullForNullField(): void
    {
        $validatedBool = Validator::validate('fieldName', null)
            ->getBoolValueOrNull();

        $this->assertNull($validatedBool);
    }

    /**
     * Test if the isBoolOrNull() method of the Validator class
     * throws an exception for a non-boolean value.
     */
    public function testIsBoolOrNullThrowsExceptionForNonBooleanValue(): void
    {
        $this->expectException(
            \PhpType\Exception\NonBooleanFieldException::class
        );

        Validator::validate('fieldName', 'nonBooleanValue')
            ->getBoolValueOrNull();
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
        $this->expectException(
            \PhpType\Exception\EmptyStringFieldException::class
        );

        Validator::validate('fieldName', '')
            ->stringNotEmpty();
    }

    /**
     * Test getStringValueOrNull() returns validated string for
     *  non-empty string.
     */
    public function testGetStringValueOrNullReturnsValidatedStringForNonEmptyString(): void
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
        $this->expectException(
            \PhpType\Exception\NonStringFieldException::class
        );

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
        $this->expectException(\PhpType\Exception\NullFieldException::class);

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
        $this->expectException(
            \PhpType\Exception\NonStringFieldException::class
        );

        Validator::validate('fieldName', 123)
            ->getStringValue();
    }
}
