<?php

namespace App\Http\Controllers;

use App\BookTitle;
use App\Category;
use App\Http\Requests\StoreBook;
use App\Language;
use App\Publisher;

class BookController extends Controller
{
    public function showCreate()
    {
        return view('admin.books.create');
    }

    public function store(StoreBook $request)
    {
        $bookTitle = new BookTitle;

        $bookTitle->fill(
            array_merge(
                $request->only(['title', 'sort_title']),
                ['author_id' => $request->get('author')]
            )
        );

        $language = $this->processLanguage($request->get('language'));
        $publisher = $this->processPublisher($request->get('publisher'));
        $category = $this->processCategory($request->get('category'));

        $bookTitle->language()->associate($language);
        $bookTitle->publisher()->associate($publisher);
        $bookTitle->category()->associate($category);

        $bookTitle->save();

        return redirect()->back()->with('message', 'libro registrado');
    }

    protected function processLanguage($value)
    {
        $foundLanguage = Language::find($value);

        return ($foundLanguage) ? $foundLanguage : Language::create(['name' => $value]);
    }

    protected function processPublisher($value)
    {
        $foundPublisher = Publisher::find($value);

        return ($foundPublisher) ? $foundPublisher : Publisher::create(['name' => $value]);
    }

    protected function processCategory($value)
    {
        $foundCategory = Category::find($value);

        return ($foundCategory) ? $foundCategory : Category::create(['name' => $value]);
    }
}
