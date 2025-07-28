<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'main_stack',
        'github_link',
        'portfolio_link',
        'linkedin_link',
        'resume_path',
        'resume_url',
        'profile_picture_path',
    ];

    protected $casts = [
        'main_stack' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
