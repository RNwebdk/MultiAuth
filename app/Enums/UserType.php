<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADMINISTRATOR()
 * @method static static MANAGER()
 * @method static static USER()
 */
final class UserType extends Enum
{
    public const ADMINISTRATOR = 1;
    public const MANAGER = 2;
    public const USER = 3;
}
