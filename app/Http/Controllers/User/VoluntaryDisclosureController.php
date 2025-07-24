<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\VoluntaryDisclosure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class VoluntaryDisclosureController extends Controller
{

       use AuthorizesRequests; 
    public function index()
    {
        $disclosures = VoluntaryDisclosure::where('user_id', Auth::id())->get();
        return view('user.voluntary_disclosures.index', compact('disclosures'));
    }

    public function create()
    {
        return view('user.voluntary_disclosures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'disability_status' => 'nullable|string|max:255',
            'ethnicity' => 'nullable|string|max:255',
            'gender_identity' => 'nullable|string|max:255',
            'is_veteran' => 'nullable|boolean',
        ]);

        $validated['user_id'] = Auth::id();

        VoluntaryDisclosure::create($validated);

        return Redirect::route('user.voluntary_disclosures.index')->with('status', 'Voluntary disclosure added.');
    }

    public function edit(VoluntaryDisclosure $voluntaryDisclosure)
    {
        $this->authorize('update', $voluntaryDisclosure);
        return view('user.voluntary_disclosures.edit', compact('voluntaryDisclosure'));
    }

    public function update(Request $request, VoluntaryDisclosure $voluntaryDisclosure)
    {
        $this->authorize('update', $voluntaryDisclosure);

        $validated = $request->validate([
            'disability_status' => 'nullable|string|max:255',
            'ethnicity' => 'nullable|string|max:255',
            'gender_identity' => 'nullable|string|max:255',
            'is_veteran' => 'nullable|boolean',
        ]);

        $voluntaryDisclosure->update($validated);

        return Redirect::route('user.voluntary_disclosures.index')->with('status', 'Voluntary disclosure updated.');
    }

    public function destroy(VoluntaryDisclosure $voluntaryDisclosure)
    {
        $this->authorize('delete', $voluntaryDisclosure);

        $voluntaryDisclosure->delete();

        return Redirect::route('user.voluntary_disclosures.index')->with('status', 'Voluntary disclosure deleted.');
    }
}
