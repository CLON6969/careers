<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeTable1;

class WebHomepageContentTableController extends Controller
{
    public function index()
    {
        $records = HomeTable1::latest()->get();
        return view('admin.web.homepage.table.index', compact('records'));
    }

    public function create()
    {
        return view('admin.web.homepage.table.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title1' => 'required|string|max:255',
            'title1_content' => 'required|string',
            'title1_small_text' => 'nullable|string|max:255',
            'picture' => 'required|image|max:2048',
        ]);

        $path = $request->file('picture')->store('uploads/pics', 'public');

        HomeTable1::create([
            'title1' => $request->title1,
            'title1_content' => $request->title1_content,
            'title1_small_text' => $request->title1_small_text,
            'picture' => $path,
        ]);

        return redirect()->route('admin.web.homepage.table.index')->with('success', 'Record added successfully.');
    }

    public function edit(HomeTable1 $table)
    {
        return view('admin.web.homepage.table.edit', compact('table'));
    }

    public function update(Request $request, HomeTable1 $table)
    {
        $request->validate([
            'title1' => 'required|string|max:255',
            'title1_content' => 'required|string',
            'title1_small_text' => 'nullable|string|max:255',
            'picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title1', 'title1_content', 'title1_small_text']);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('uploads/pics', 'public');
        }

        $table->update($data);

        return redirect()->route('admin.web.homepage.table.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(HomeTable1 $table)
    {
        $table->delete();
        return back()->with('success', 'Record deleted successfully.');
    }
}
