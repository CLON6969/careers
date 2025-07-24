<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EducationController extends Controller
{

       use AuthorizesRequests; 
    public function index()
    {
        $educations = Education::where('user_id', Auth::id())->get();
        return view('user.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('user.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'institution' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        Education::create($validated);

        return Redirect::route('user.educations.index')->with('status', 'Education added.');
    }

    public function edit(Education $education)
    {
        $this->authorize('update', $education);
        return view('user.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $this->authorize('update', $education);

        $validated = $request->validate([
            'level' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'institution' => 'nullable|string|max:255',
        ]);

        $education->update($validated);

        return Redirect::route('user.educations.index')->with('status', 'Education updated.');
    }

    public function destroy(Education $education)
    {
        $this->authorize('delete', $education);

        $education->delete();

        return Redirect::route('user.educations.index')->with('status', 'Education deleted.');
    }
}
