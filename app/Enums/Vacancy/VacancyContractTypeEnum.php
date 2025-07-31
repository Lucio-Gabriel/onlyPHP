<?php

namespace App\Enums\Vacancy;

enum VacancyContractTypeEnum: string
{
    case Pj = 'pj';
    case Clt = 'clt';
    case Trainee = 'trainee';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toRule(): string
    {
        return implode(',', self::values());
    }
}
