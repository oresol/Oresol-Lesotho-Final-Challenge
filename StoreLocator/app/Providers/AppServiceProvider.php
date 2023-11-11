<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Tags;
use App\Models\StoreTypes;
use App\Models\Company;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $tags = Tags::all();
        View::share('tags', $tags);
        $storetypes = StoreTypes::all();
        View::share('storetypes', $storetypes);

        $company = Company::all();
        View::share('company', $company);
    }
}
