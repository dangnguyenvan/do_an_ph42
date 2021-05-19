<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const PENDING =   "PENDING";
    const COMPLETED =   "COMPLETED";
    const CANCELLED = "CANCELLED";
    const SHIPPING = "SHIPPING";
}
