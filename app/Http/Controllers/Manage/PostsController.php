<?php

namespace App\Http\Controllers\Manage;
use App\Tag;
use Session;
use App\Post;
use App\Category;
use App\Jobs\ImageEdit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('q');
        if($query) {
            $posts = $query ? Post::search($query)->orderBy('created_at','desc')->paginate(7) : Post::all();
            return view('manage.posts.index', compact('posts'));
        } else {
            $posts = Post::orderBy('created_at','desc')->paginate(7);
            return view('manage.posts.index', compact('posts'));
        }
        // $posts = Post::orderBy('created_at','desc')->paginate(3);
        // return view('manage.posts.index', compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if($category->count() == 0 || $tags->count() == 0) {
            Session::flash('error', 'You must have category and tags to make post');
            return redirect()->back();
        }
        return view('manage.posts.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts,title',
            'content' => 'required',
            'featured' => 'required|image',
            'tags' => 'required',
            'categories' => 'required'    
        ]);
        $featured = $request->featured;
        $featured_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_name);
        if (!file_exists('uploads/posts/thumbs')) {
            mkdir('uploads/posts/thumbs', 0777, true); //kreira folder thumbs ako ga nema.intervention ne moze da kreira sam
        }
        // $thumb = Image::make('uploads/posts/'.$featured_name)->resize(150, 150)->save('uploads/posts/thumbs/'.$featured_name, 60); // 60-kvalitet slike

        $post = new Post;
        $post->title = $request->title;
        $post->status = $request->status;
        $post->content = $request->content;
        $post->featured = 'uploads/posts/'.$featured_name;
        $post->thumb = 'uploads/posts/thumbs/'.$featured_name;
        $post->slug = str_slug($request->title);
        $post->user_id = Auth::id();
        $post->save();

        ImageEdit::dispatch($featured_name);

        $post->tags()->attach($request->tags);
        $post->categories()->attach($request->categories);
        Session::flash('success', 'Post created successfully !');
        return redirect(route('posts'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
        return view('manage.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $category = Category::all();
        return view('manage.posts.edit', compact('post', 'category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => "required|max:255|unique:posts,title,$id",
            'slug' => "required|max:255|unique:posts,slug,$id",
            'content' => 'required',
            'tags' => 'required',
            'categories' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')) { //provera da li je user menjao sliku
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
            $thumb = Image::make('uploads/posts/'.$featured_new_name)->resize(150, 150)->save('uploads/posts/thumbs/'.$featured_new_name, 60); // 60-kvalitet slike
            $post->thumb = 'uploads/posts/thumbs/'.$featured_new_name;
        }
        $post->title = $request->title;
        $post->status = $request->status;
        $post->content = $request->content;
        $post->slug = str_slug($request->slug);
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        Session::flash('success', 'Post updated successfully');
        return redirect(route('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();              
        $post->categories()->detach();
        $post->tags()->detach();
        
        $image = $post->featured;  // brise sliku vezanu za post
        if(File::exists($image)) {
            File::delete($image);
        }
        
        $thumb = $post->thumb;  // brise thumbnail vezan za post
        if(File::exists($thumb)) {
            File::delete($thumb);
        } 

        Session::flash('success', 'Post deleted');
        return redirect()->back();
    }

    public function blog() {
        $posts = Post::published()->get();
        return view('manage.blog', compact('posts'));
    }

}
