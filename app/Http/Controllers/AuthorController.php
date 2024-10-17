<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the author
        $author = Author::create($request->only(['name']));

        return redirect()->route('dashboard')->with('success', 'Author created successfully.');
    }

    public function update(Request $request, Author $author)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the author
        $author->update($request->only(['name']));

        return redirect()->route('dashboard')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('dashboard')->with('success', 'Author deleted successfully.');
    }
}
