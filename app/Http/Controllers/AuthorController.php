<?php

namespace App\Http\Controllers;


use App\Author;
use App\Http\Requests\StoreAuthor;

class AuthorController extends Controller
{
    public function showCreate()
    {
        return view('admin.authors.create');
    }

    public function store(StoreAuthor $request)
    {
        Author::create([
            'name' => $request->get('name'),
            'sort_name' => $request->get('sort_name')
        ]);

        return redirect()->back()->with('message', 'autor registrado');
    }
}