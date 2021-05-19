<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ActiveStatus extends Enum
{
    const ACTIVE =   "ACTIVE";
    const INACTIVE =   "INACTIVE";
    
}
