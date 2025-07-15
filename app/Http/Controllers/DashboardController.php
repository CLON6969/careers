<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function staff()
    {
        return view('staff.dashboard');
    }

    public function user()
    {
        return view('user.dashboard');
    }

    public function applicant()
    {
        $user = Auth::user();

        if (!$user->onboarding_complete) {
            return redirect()->route('onboarding.step1');
        }

        return view('applicant.dashboard');
    }
}
