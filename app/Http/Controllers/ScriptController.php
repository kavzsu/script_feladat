<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    // Előadások listázása
    public function index()
    {
        $scripts = Script::withCount('entries')->get();
        return view('scripts.index', compact('scripts'));
    }

    // Új előadás űrlap
    public function create()
    {
        return view('scripts.create');
    }

    // Mentés
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:150',
            'author' => 'nullable|min:2|max:150',
        ]);

        Script::create($validated);
        return redirect()->route('scripts.index')->with('success', 'Előadás sikeresen létrehozva!');
    }

    // Törlés
    public function destroy(Script $script)
    {
        $script->delete();
        return redirect()->route('scripts.index')->with('success', 'Előadás törölve!');
    }

    // Export nézet
    public function export(Script $script)
    {
        $entries = $script->entries()->orderBy('order_no')->get();
        return view('scripts.export', compact('script', 'entries'));
    }
}

