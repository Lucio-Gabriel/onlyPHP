<?php

namespace App\Models;

use App\Enums\Vacancy\VacancyContractTypeEnum;
use App\Enums\Vacancy\VacancyLocationEnum;
use App\Enums\Vacancy\VacancyTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'city',
        'state',
        'company',
        'stacks',
        'salary',
        'type',
        'contract_type',
        'location',
        'user_id',
    ];

    protected $casts = [
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'deleted_at'    => 'datetime',
        'contract_type' => VacancyContractTypeEnum::class,
        'type'          => VacancyTypeEnum::class,
        'location'      => VacancyLocationEnum::class,
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appliers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_vacancy', 'vacancy_id', 'user_id');
    }
}
