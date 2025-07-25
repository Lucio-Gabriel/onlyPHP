<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
 * @mixin Builder
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
        'linkedin_id',
        'linkedin_token',
        'avatar',
        'is_candidate',
        'is_recruiter',
        'is_admin',
        'password',
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
}
