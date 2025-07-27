<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case APPLIED = 'applied';
    case IN_REVIEW = 'in_review';
    case SHORTLISTED = 'shortlisted';
    case INTERVIEW_SCHEDULED = 'interview_scheduled';
    case INTERVIEWED = 'interviewed';
    case OFFERED = 'offered';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case WITHDRAWN = 'withdrawn';
    case HIRED = 'hired';
    case RESPONDED = 'responded';
    case ARCHIVED = 'archived';
}
