<?php

namespace App\Enums\User;

enum UserTypeEnum: string
{
    case Admin = 'admin';
    case Recruiter = 'recruiter';
    case Candidate = 'candidate';
}
