# PhpType

[![license](https://img.shields.io/badge/License-MIT-blue.svg?style=flat)](LICENSE)

PhpType is a PHP library meticulously crafted for validating field values, safeguarding data integrity, and quelling linter alerts. It goes beyond mere linting concerns by seamlessly incorporating runtime checks. These runtime checks act as a robust validation layer during code execution, ensuring that your data aligns with the specified types. This dual approach not only suppresses linter warnings but also fortifies your application's integrity, instilling an extra level of confidence in your data handling processes.

## Features

-   Supports the `bool`, `int` and `string` data types.
-   Provides a simple and easy-to-use interface.
-   Is lightweight and efficient.
-   Is well-documented.

## Requirements

-   PHP 8.1 or higher

## Table of Contents

-   [Installation](#installation)
-   [Usage](#usage)
-   [Public Methods](#public-methods)
-   [Frequently Asked Questions (FAQ)](#frequently-asked-questions-faq)
-   [Credits](#credits)
-   [Contributing](#contributing)
-   [License](#license)

## Installation

You can install this library via Composer. Run the following command:

```bash
composer require sandromiguel/php-type
```

## Usage

This library excels in validating arrays, ensuring that data adheres to specified types and contributing to a more robust and reliable codebase. Consider the following scenarios where PhpType proves beneficial:

#### Scenario 1: Method Input Validation

When accepting arrays as method parameters, it's crucial to validate the input to guarantee that the data aligns with the expected types. Using PhpType in such scenarios enhances code reliability and prevents unexpected type mismatches.

Example thats shows a linter warning:

```
    /**
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

#### Scenario 2: Method Output Validation

In situations where it is necessary to return values from an array, such as strings, PhpType ensures that the returned values adhere to the expected types.

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

## Public Methods

-   **`validate(string $fieldName, mixed $fieldValue): Validator`**
    Start the validation chain for a field.

-   **`stringNotEmpty(): Validator`**
    Check if the string is not empty.

-   **`getBoolValue(): bool`**
    Get the boolean value.

-   **`getBoolValueOrNull(): ?bool`**
    Get the boolean value or null.

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

## Frequently Asked Questions (FAQ)

### Q: Why use PhpType when linters like Psalm or PHPStan already exist?

**A:** While linters are powerful tools, PhpType serves as a lightweight solution specifically designed to handle scenarios where linter warnings arise due to type mismatches in array structures. It provides a simple and easy-to-use interface, offering an alternative approach to address such issues.

### Q: Can I use PhpType in production code?

**A:** Yes, PhpType is intended for use in production code. It is perfectly suitable for production use without any issues.

### Q: Why not use deserialization libraries like symfony/serializer for handling array data?

**A:** Deserialization libraries like symfony/serializer are excellent for handling complex data structures by converting them into objects. PhpType is more suited for scenarios where direct manipulation of arrays is necessary, such as dealing with legacy code or situations where immediate refactoring is not feasible.

### Q: How do I handle linter warnings with PhpType?

**A:** PhpType helps eliminate linter warnings by providing a straightforward method for validating array values, ensuring type correctness, and suppressing alerts from linters like PHPStan. Check the documentation for examples and usage details.

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
