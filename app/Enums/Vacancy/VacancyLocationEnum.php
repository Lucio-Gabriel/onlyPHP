<?php

namespace App\Enums\Vacancy;

enum VacancyLocationEnum: string
{
    case Remote = 'remote';
    case Hybrid = 'hybrid';
    case OnSite = 'on-site';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toRule(): string
    {
        return implode(',', self::values());
    }
}
