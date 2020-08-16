<?php

namespace App\Providers;

use App\Category;
use App\Language;
use App\Publisher;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as ViewFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ViewFacade::composer(['admin.books.create'], function (View $view) {
            $categories = Category::all()->pluck('name', 'id');
            $languages = Language::all()->pluck('name', 'id');
            $publishers = Publisher::all()->pluck('name', 'id');

            $view->with([
                'categories' => $categories,
                'languages' => $languages,
                'publishers' => $publishers
            ]);
        });
    }
}
