<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use DB;
use File;

class BackendBlogController extends Controller
{

    protected $limit=5;
    protected $uploadPath;

    public function __construct()
	{
	    parent::__construct();
	    $this->uploadPath = public_path(config('cms.image.directory'));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
 
	
	public function index(Request $request)
	{	
		$onlyTrashed = FALSE;
 
	    if (($status = $request->get('status')) && $status == 'trash'){
	        $posts = Post::onlyTrashed()->with('category','author')->latest()->paginate($this->limit);
	        $allPostCount = Post::onlyTrashed()->count();
	        $onlyTrashed = TRUE;
	 
	    }
	    elseif($status == 'published')
	    {
	        $posts = Post::published()->with('category','author')->latest()->paginate($this->limit);
	        $allPostCount = Post::published()->count();
	        
	    }
	    elseif($status == 'scheduled')
	    {
	        $posts = Post::scheduled()->with('category','author')->latest()->paginate($this->limit);
	        $allPostCount = Post::scheduled()->count();
	        
	    }
	    elseif($status == 'draft')
	    {
	        $posts = Post::draft()->with('category','author')->latest()->paginate($this->limit);
	        $allPostCount = Post::draft()->count();
	        
	    }
	    else{
	        $posts = Post::with('category','author')->latest()->paginate($this->limit);
	        $allPostCount = Post::count();
	        
	    }

	    $statusList = $this->statusList();
 
    	return view("/blog/blog-admin", compact('posts','allPostCount', 'onlyTrashed','statusList'));
	  	// $education = education::all();
    //     return view('/blog/blog-admin', ['education' => $education]);
	}

	private function statusList(){
        return [
            'all' => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft' => Post::draft()->count(),
            'trash' => Post::onlyTrashed()->count(),
        ];
    }

	public function create(Post $post)
	{
	    return view("/blog/create", compact('post'));
	}

	public function store(Requests\PostRequest $request)
	{
	    $data = $this->handleRequest($request);
	 
	    $request->user()->posts()->create($data);
	 
	    return redirect('/blog-admin')->with('message', 'Post has been added');
	}

	private function handleRequest($request){
	    $data = $request->all();
	 
	    if($request->hasFile('image')){
	    
	    $image = $request->file('image');
        $thumbnail = 
        $fileName = $image->getClientOriginalName();
 
        $destination = $this->uploadPath;
 
        $uploaded = $image->move($destination, $fileName);
 
        if($uploaded){
            $width = config('cms.image.thumbnail.width');
            $height = config('cms.image.thumbnail.height');
 
            $extension = $image->getClientOriginalExtension();
            $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
 
            Image::make($destination . '/' . $fileName)
                    ->resize($width,$height)
                    ->save($destination . '/' . $thumbnail);
        }
 
 
        $data['image'] = $fileName;
		
		}

	    return $data;
	}

	public function edit($id)
	{
	    $post = Post::findOrFail($id);
	    $category = Category::all();
	    // $category = DB::table('categories')->select('id', 'title')->get();
	    return view("/blog/edit",compact('post', 'category'));
	}

	public function update(Requests\UpdatePostRequest $request, $id)
	{
	    $post = Post::findOrFail($id);
	    $oldImage = $post->image;
	 
	    $data = $this->handleRequest($request);
	    $post->update($data);
	 
	    if($oldImage !== $post->image) {
	        $this->removeImage($oldImage);
	    }
	    
	    return redirect('/blog-admin')->with('message', 'Post has been updated');
	}

	public function destroy($id)
	{
	    Post::findOrFail($id)->delete();
	 
	    return redirect('/blog-admin')->with('trash-message', ['Your post has been moved to the trash', $id]);
	}

	public function restore($id){
	    $post = Post::withTrashed()->findOrFail($id);
	    $post->restore();
 
	    return redirect('/blog-admin')->with('message', 'Your post has been restored');
	}

	public function forceDestroy($id){
	    $post = Post::withTrashed()->findOrFail($id);
	    $post->forceDelete();
 
    	$this->removeImage($post->image);
	 
	    return redirect('/blog-admin?status=trash')->with('message', 'The post has been deleted permanently');
	}

	private function removeImage($image){
    if(!empty($image)){
        $imagePath = $this->uploadPath . '/' . $image;
        $ext = substr(strrchr($image, '.'), 1);
        $thumbnail = str_replace(".{$ext}","_thumb.{$ext}", $image);
        $thumbnailPath = $this->uploadPath . '/' . $thumbnail;
 
        if (file_exists($imagePath) ) unlink($imagePath);
        if (file_exists($thumbnailPath) ) unlink($thumbnailPath);
	    }
	}

}
