<?php

namespace App\Providers;
use App\Category;
use App\Post;
use App\Views\Composers\NavigationComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('/blog/blog', function($view){
        // $categories = Category::with(['posts' => function($query){
        //     $query->published();
        // }])->orderBy('title','asc')->get();
 
        // return $view->with('categories',$categories);
        // });

        // view()->composer('/blog/blog', function($view){
        //     $popularPosts = Post::published()->popular()->take(3)->get();
        //     return $view->with('popularPosts', $popularPosts);
        // });

        view()->composer('blog.blog', NavigationComposer::class);
    }
}
