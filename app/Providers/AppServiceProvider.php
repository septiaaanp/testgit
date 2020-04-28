<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
          // $user = \App\User::with('profile')->find($id); //Change this to the code you would use to get the education

          //  view()->share('user', $user);

        // View::share('education', '$education');

        view()->composer(['index', 'blog', '/blog/show', '/blog/blog'], function ($view) {

        $education = \App\education::all(); 
        $profile = \App\User::with('profile')->find(1);
        $experience = \App\experience::all(); 
        $certificate = \App\certificate::all();
        $popularPosts = \App\Post::published()->popular()->take(4)->get(); 

        $view->with(compact('education','profile', 'experience', 'certificate', 'popularPosts'));
        });
        Schema::defaultStringLength(191);
    }
}
