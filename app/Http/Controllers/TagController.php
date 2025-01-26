<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('pages.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        Tag::create($request->all());
        return redirect()->route('tags')->with('success', 'Tag created successfully');
    }
}
