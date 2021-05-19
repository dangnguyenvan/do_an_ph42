<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends Enum
{
    const ROLE_ADMIN =   "ROLE_ADMIN";
    const ROLE_USER =   "ROLE_USER";
    const ROLE_SELLER = "ROLE_SELLER";
}
