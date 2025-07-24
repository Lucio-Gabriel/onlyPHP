<?php

namespace App\Http\Controllers\Recruiter\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Login extends Controller
{
    public function __invoke(): View
    {
        return view('recruiter.auth.login');
    }
}
