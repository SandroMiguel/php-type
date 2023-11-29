<?php

/**
 * NullFieldException
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
 * Exception thrown for null field.
 */
final class NullFieldException extends \InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string $fieldName Name of the field that cannot be null.
     */
    public function __construct(string $fieldName)
    {
        parent::__construct(\sprintf('"%s" cannot be null.', $fieldName));
    }
}
