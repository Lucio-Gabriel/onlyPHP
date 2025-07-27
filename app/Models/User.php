<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'is_candidate',
        'is_recruiter',
        'linkedin_id',
        'linkedin_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /**
     * Determine if the user is a candidate.
     */
    public function isCandidate(): bool
    {
        return $this->is_candidate;
    }

    /**
     * Determine if the user is a recruiter.
     */
    public function isRecruiter(): bool
    {
        return $this->is_recruiter;
    }

    /**
     * Relationships
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }

    public function applied_vacancies(): BelongsToMany
    {
        return $this->belongsToMany(Vacancy::class, 'user_vacancy', 'user_id', 'vacancy_id');
    }
}
