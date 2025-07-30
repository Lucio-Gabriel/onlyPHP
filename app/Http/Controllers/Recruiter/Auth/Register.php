<?php

namespace App\Http\Controllers\Recruiter\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class Register extends Controller
{
    public function index(): View
    {
        return view('recruiter.auth.register');
    }

    public function store(): RedirectResponse
    {
        $userLinkedin = Socialite::driver('linkedin_recruiter')->user();

        $candidate = User::query()
            ->where('email', $userLinkedin->getEmail())
            ->where('is_candidate', 1)
            ->first();

        if ($candidate) {
            Auth::login($candidate);

            return redirect()->route('index')->with('message', 'Você já está registrado como candidato.');
        }

        $user = User::updateOrCreate([
            'linkedin_id' => $userLinkedin->getId(),
        ], [
            'name'           => $userLinkedin->getName(),
            'email'          => $userLinkedin->getEmail(),
            'avatar'         => $userLinkedin->getAvatar(),
            'linkedin_id'    => $userLinkedin->getId(),
            'linkedin_token' => $userLinkedin->getToken(),
            'is_candidate'   => 0,
            'is_recruiter'   => 1,
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }
}
