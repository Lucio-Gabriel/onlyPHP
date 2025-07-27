<?php

namespace App\Enums\Vacancy;

enum VacancyLocationEnum: string
{
    case Remote = 'remote';
    case Hybrid = 'hybrid';
    case OnSite = 'on-site';
}
