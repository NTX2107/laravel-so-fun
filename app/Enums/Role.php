<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
    const ADMIN = 0;
    const USER = 1;
}
