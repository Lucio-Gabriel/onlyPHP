<?php

namespace App\Enums\Vacancy;

enum VacancyTypeEnum: string
{
    case FullTime = 'full-time';
    case PartTime = 'part-time';
    case Contract = 'contract';
    case Temporary = 'temporary';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toRule(): string
    {
        return implode(',', self::values());
    }
}
