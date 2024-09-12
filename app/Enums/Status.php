<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const STOPPED = '0';
    const STUDYING = '1';
    // Optional: Helper function to get all values
    public static function all()
    {
        return [
            self::STUDYING,
            self::STOPPED,
        ];
    }
}

