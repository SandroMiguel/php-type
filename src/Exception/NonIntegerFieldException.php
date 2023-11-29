<?php

/**
 * NonIntegerFieldException
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

namespace PhpType\Exception;

/**
 * Exception thrown for non-string field.
 */
final class NonIntegerFieldException extends \InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string $fieldName Name of the field that must be an integer.
     */
    public function __construct(string $fieldName)
    {
        parent::__construct(\sprintf('"%s" must be an integer.', $fieldName));
    }
}
