<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class NavigationMenu extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        return $this->redirect(route('login.candidate'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.navigation-menu');
    }
}
