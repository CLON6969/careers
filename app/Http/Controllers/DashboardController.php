<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Redirect applicants who have not completed onboarding
        if ($user->role_id === 4 && !$user->onboarding_complete) {
            return redirect()->route('onboarding.step1');
        }

        // Customize dashboard view depending on the role
        if ($user->role_id === 1) {
            return view('dashboard.admin'); // Admin dashboard
        }

        if ($user->role_id === 2) {
            return view('dashboard.hr'); // HR or Manager dashboard
        }

        if ($user->role_id === 3) {
            return view('dashboard.user'); // Applicant dashboard
        }

        if ($user->role_id === 4) {
            return view('dashboard'); // Applicant dashboard
        }

        // Default fallback
        return view('dashboard.default');
    }
}
