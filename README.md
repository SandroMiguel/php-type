# PhpType

[![license](https://img.shields.io/badge/License-MIT-blue.svg?style=flat)](LICENSE)

A PHP library designed for validating field values, ensuring data integrity, and suppressing linter alerts.

## Features

-   Supports the `int` and `string` data types.
-   Provides a simple and easy-to-use interface.
-   Is lightweight and efficient.
-   Is well-documented.

## Requirements

-   PHP 8.1 or higher

## Table of Contents

-   [Installation](#installation)
-   [Usage](#usage)
-   [Public Methods](#public-methods)
-   [Credits](#credits)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

You can install this library via Composer. Run the following command:

```bash
composer require sandromiguel/php-type
```

## Usage

Use the `Validator` class to effortlessly validate PHP field values, preventing linters from throwing alerts. Currently, this proof-of-concept version supports validation for integer and string types.

```
// Example usage for validating an integer field
use PhpType\Validator;

$fieldName = 'exampleField';
$fieldValue = 42;

Validator::validate($fieldName, $fieldValue)->getIntValue();

// Example usage for validating a string field
$fieldName = 'exampleStringField';
$fieldValue = 'Hello, World!';

Validator::validate($fieldName, $fieldValue)->getStringValue();
```

### Array values validation:

This library is especially useful for validating values within an array, particularly when they need to be injected into functions with defined type hints or when ensuring the correct return type for a function.

Example usage for ensuring a string is passed as a parameter.

```
function acceptSomeString(string $someString)
{
  // ... algum código
}

// Chamada à função - não garante o tipo
function badFunction()
{
  $someVar = acceptSomeString($this->someArray['someKey']);
  // ... algum código
}

// Chamada à função - garante o tipo
function goodFunction()
{
  $someKeyValue = Validator::validate('someKey', $this->someArray['someKey'])->getStringValue();
  $someVar = acceptSomeString($someKeyValue);
  // ... algum código
}
```

Example usage for ensuring a string return type:

```
use PhpType\Validator;

/**
 * Get some text.
 *
 * @return string The text.
 */
public function getSomeText(): string
{
    return Validator::validate(
        'fieldName',
        $this->params['fieldName'] ?? null
    )
        ->stringNotEmpty()
        ->getStringValue();
}
```

Another example has a linter warning:

```
    /**
     * Some method that has a warning.
     *
     * Warning example: [phpstan] Parameter #1 $property1 of class
     *  PhpTypeTest\Entity constructor expects int, int|string given.
     *
     * @param array<string,int|string> $someArray The array.
     */
    public static function someMethodWithWarning(array $someArray): void
    {
        $someEntity = new Entity(
            $someArray['someInt'],
            $someArray['someString']
        );
        echo $someEntity->getProperty1() . "\n";
        echo $someEntity->getProperty2() . "\n";
    }
```

Address the previous warning with PhpType:

```
    /**
     * Some method using PhpType for type checking.
     *
     * @param array<string,int|string> $someArray The array.
     */
    public static function someMethodWithPhpType(array $someArray): void
    {
        $someInt = Validator::validate('someInt', $someArray['someInt'])->getIntValue();
        $someString = Validator::validate('someString', $someArray['someString'])->getStringValue();

        $someEntity = new Entity($someInt, $someString);
        echo $someEntity->getProperty1() . "\n";
        echo $someEntity->getProperty2() . "\n";
    }
```

## Public Methods

-   **`validate(string $fieldName, mixed $fieldValue): Validator`**
    Start the validation chain for a field.

-   **`stringNotEmpty(): Validator`**
    Check if the string is not empty.

-   **`getIntValue(): int`**
    Get the integer value.

-   **`getIntValueOrNull(): ?int`**
    Get the integer value or null.

-   **`getStringValue(): string`**
    Get the string value.

-   **`getStringValueOrNull(): ?string`**
    Get the string value or null.

-   **`getValue(): mixed`**
    Get the mixed value.

## Credits

-   [EditorConfig](https://editorconfig.org/): IDE coding style settings.
-   [PHPUnit](https://phpunit.de/): Testing framework for PHP.
-   [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer): PHP coding standards checker and fixer.
-   [PHP Insights](https://phpinsights.com/): Code quality and architecture analysis tool.
-   [PHP Metrics](https://phpmetrics.org/): PHP metrics generator.
-   [PHPStan](https://phpstan.org/): PHP static analysis tool.
-   [Psalm](https://psalm.dev/): Static analysis tool for PHP.
-   [Composer](https://getcomposer.org/): Dependency management for PHP.

## Contributing

Want to contribute? All contributions are welcome. Read the [contributing guide](CONTRIBUTING.md).

## Questions

If you have questions tweet me at [@sandro_m_m](https://twitter.com/sandro_m_m) or [open an issue](https://github.com/SandroMiguel/php-type/issues/new).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

**~ sharing is caring ~**
