<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use App\Models\Nav1;
use Illuminate\Http\Request;

class Nav1Controller extends Controller
{
    public function index()
    {
        $nav1s = Nav1::orderBy('id')->get();
        return view('admin.web.general.nav1.index', compact('nav1s'));
    }

    public function create()
    {
        return view('admin.web.general.nav1.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'name_url' => 'required|string|max:255',
        ]);

        Nav1::create($request->only(['name', 'name_url']));

        return redirect()->route('admin.web.general.nav1.index')
                         ->with('success', 'Navigation item created successfully.');
    }

    public function edit(Nav1 $nav1)
    {
        return view('admin.web.general.nav1.edit', compact('nav1'));
    }

    public function update(Request $request, Nav1 $nav1)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'name_url' => 'required|string|max:255',
        ]);

        $nav1->update($request->only(['name', 'name_url']));

        return redirect()->route('admin.web.general.nav1.index')
                         ->with('success', 'Navigation item updated successfully.');
    }

    public function destroy(Nav1 $nav1)
    {
        $nav1->delete();

        return back()->with('success', 'Navigation item deleted successfully.');
    }
}
