<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ExperienceController extends Controller
{

       use AuthorizesRequests; 
    public function index()
    {
        $experiences = Experience::where('user_id', Auth::id())->get();
        return view('user.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('user.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employer' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:1000', // optional extra field
        ]);

        $validated['user_id'] = Auth::id();

        Experience::create($validated);

        return Redirect::route('user.experiences.index')->with('status', 'Experience added.');
    }

    public function edit(Experience $experience)
    {
        $this->authorize('update', $experience);
        return view('user.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $this->authorize('update', $experience);

        $validated = $request->validate([
            'employer' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:1000',
        ]);

        $experience->update($validated);

        return Redirect::route('user.experiences.index')->with('status', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $this->authorize('delete', $experience);

        $experience->delete();

        return Redirect::route('user.experiences.index')->with('status', 'Experience deleted.');
    }
}
