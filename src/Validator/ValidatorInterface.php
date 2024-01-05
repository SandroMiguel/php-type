<?php

/**
 * ValidatorInterface
 *
 * @package PhpType
 * @license MIT https://github.com/SandroMiguel/php-type/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-type
 */

declare(strict_types=1);

namespace PhpType\Validator;

/**
 * Validator interface.
 */
interface ValidatorInterface
{
    /**
     * Start the validation chain for a field.
     */
    public function validate(): void;
}
