<?php

namespace App\Enums;

final class ItemStatusEnum {
    public const PENDING = 'pending';
    public const DONE = 'done';

    public static function getValues(): array{
        return [
            self::PENDING,
            self::DONE
        ];
    }
}