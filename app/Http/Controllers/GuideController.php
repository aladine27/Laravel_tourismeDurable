<?php
namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('guide.index', compact('guides'));
    }

    public function create()
    {
        return view('guides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'experience_years' => 'required|integer',
            'email' => 'required|email|unique:guides,email',
            'phone' => 'required',
        ]);

        Guide::create($request->all());
        return redirect()->route('guides.index')->with('success', 'Guide créé avec succès.');
    }

    public function edit(Guide $guide)
    {
        return view('guides.edit', compact('guide'));
    }

    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'name' => 'required',
            'experience_years' => 'required|integer',
            'email' => 'required|email|unique:guides,email,' . $guide->id,
            'phone' => 'required',
        ]);

        $guide->update($request->all());
        return redirect()->route('guides.index')->with('success', 'Guide mis à jour avec succès.');
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Guide supprimé avec succès.');
    }
}

