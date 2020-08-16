<?php

namespace App\Http\Controllers;

use App\Author;
use App\Publisher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchAuthor(Request $request)
    {
        $term = $request->query('q');


        /** @var Collection $authors */
        $authors = Author::where('name', 'LIKE', '%' . $term . '%')->get();

        $results = $authors->map(function (Author $author) {
            return [
                'id' => $author->id,
                'text' => ucwords($author->name)
            ];
        });

        return ['results' => $results];
    }

    public function searchPublisher(Request $request)
    {
        $term = $request->query('q');


        /** @var Collection $publishers */
        $publishers = Publisher::where('name', 'LIKE', '%' . $term . '%')->get();

        $results = $publishers->map(function (Publisher $publisher) {
            return [
                'id' => $publisher->id,
                'text' => ucwords($publisher->name)
            ];
        });

        return ['results' => $results];
    }
}
