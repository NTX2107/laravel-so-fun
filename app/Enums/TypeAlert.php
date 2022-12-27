<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TypeAlert extends Enum
{
    const SUCCESS = "success";
    const ERROR = "error";
    const INFO = "info";
    const WARNING = "warning";
    const QUESTION = "question";
}
