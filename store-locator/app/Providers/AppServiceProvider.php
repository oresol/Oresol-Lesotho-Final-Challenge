<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Tag;
use App\Models\Category;
use App\Models\UserProfile;

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
    public function boot()
    {
        $tags = Tag::all();
        View::share('tags', $tags);

        $categories = Category::all();
        View::share('categories', $categories);

        $user = UserProfile::all();
        View::share('user', $user);
       
    }
}
