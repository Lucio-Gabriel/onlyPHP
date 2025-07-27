<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * User model representing authenticated users in the system.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $linkedin_id
 * @property string $linkedin_token
 * @property bool $is_candidate
 * @property bool $is_recruiter
 * @property bool $is_admin
 * @property string|null $avatar
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @mixin
 */
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

    public function isAdmin(): bool
    {
        return $this->is_admin;
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
