<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{	
	protected $limit = 3;
    public function index(){

    	$categories = Category::with(['posts' => function($query){
		$query->published();
		}])
			->orderBy('title','asc')
			->get();
 
		$posts = Post::with('author')
			->latestFirst()
			->published()
			->filter(request('term'))
			->paginate($this->limit);

			
		return view("/blog/blog", compact('posts','categories'));

		// $posts = Post::with('author')
		// 		->latestFirst()
		// 		->published()
		// 		->paginate($this->limit);
				
		// return view("/blog/blog", compact('posts'));
    }


	public function category(Category $category){
		$categoryName = $category->title;
	 
		$categories = Category::with(['posts' => function($query){
			$query->published();
		}])
				->orderBy('title','asc')
				->get();
	 
		$posts = $category->posts()
						->with('author')
						->latestFirst()
						->paginate($this->limit);
				
		return view("/blog/blog", compact('posts','categories','categoryName'));
	}


	public function show(Post $post){
		$categories = Category::with(['posts' => function($query){
		$query->published();
		}])
			->orderBy('title','asc')
			->get();
 

		$post->increment('view_count',1);
		return view("/blog/show", compact('post', 'categories'));
	}

	public function author(User $author, Category $category){
		$authorName = $author->name;
		$categoryName = $category->title;
	 	
	 	$categories = Category::with(['posts' => function($query){
			$query->published();
		}])
				->orderBy('title','asc')
				->get();

		$posts = $author->posts()
						->with('category')
						->latestFirst()
						->published()
						->paginate($this->limit);
				
		return view("/blog/blog", compact('posts','authorName','categories','categoryName'));
	}

	
}
