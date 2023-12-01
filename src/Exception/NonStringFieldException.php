<?php

/**
 * NonStringFieldException
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
final class NonStringFieldException extends \InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string $fieldName Name of the field that must be a string.
     */
    public function __construct(string $fieldName)
    {
        parent::__construct(\sprintf('"%s" must be a string.', $fieldName));
    }
}
