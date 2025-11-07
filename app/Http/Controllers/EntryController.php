<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Script;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    // Összes bejegyzés listázása
    public function index()
    {
        $entries = Entry::with('script')->orderBy('script_id')->orderBy('order_no')->get();
        return view('entries.index', compact('entries'));
    }

    // Egy adott előadás bejegyzései
    public function indexByScript(Script $script)
    {
        $entries = $script->entries()->orderBy('order_no')->get();
        return view('entries.by_script', compact('script', 'entries'));
    }

    // Új bejegyzés űrlap
    public function create()
    {
        $scripts = Script::all();
        return view('entries.create', compact('scripts'));
    }

    // Mentés
    public function store(Request $request)
    {
        $validated = $request->validate([
            'script_id' => 'required|exists:scripts,id',
            'order_no' => 'required|integer|min:1',
            'name' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'action' => 'nullable|string|max:255',
            'media' => 'nullable|string|max:255',
            'projection' => 'nullable|string|max:255',
            'light' => 'nullable|string|max:255',
            'microphone' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
        ]);

        // legalább 'name' vagy 'content' legyen megadva
        if (empty($validated['name']) && empty($validated['content'])) {
            return back()->withErrors(['name' => 'Legalább a megnevezés vagy a tartalom kötelező.'])->withInput();
        }

        Entry::create($validated);
        return redirect()->route('entries.index')->with('success', 'Bejegyzés mentve!');
    }

    // Szerkesztés
    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    // Frissítés
    public function update(Request $request, Entry $entry)
    {
        $validated = $request->validate([
            'order_no' => 'required|integer|min:1',
            'name' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'action' => 'nullable|string|max:255',
            'media' => 'nullable|string|max:255',
            'projection' => 'nullable|string|max:255',
            'light' => 'nullable|string|max:255',
            'microphone' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
        ]);

        $entry->update($validated);
        return redirect()->route('entries.index')->with('success', 'Bejegyzés frissítve!');
    }

    // Törlés
    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('entries.index')->with('success', 'Bejegyzés törölve!');
    }
}
