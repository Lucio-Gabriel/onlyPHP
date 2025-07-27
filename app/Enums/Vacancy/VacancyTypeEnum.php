<?php

namespace App\Enums\Vacancy;

enum VacancyTypeEnum: string
{
    case FullTime = 'full-time';
    case PartTime = 'part-time';
    case Contract = 'contract';
    case Temporary = 'temporary';
}
