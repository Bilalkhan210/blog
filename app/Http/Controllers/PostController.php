<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    // Admin
    if(auth()->user()->role == 1){

        $posts = Post::with('user','category')->paginate(5);

    }else{

        // Normal user only own posts
        $posts = Post::where('user_id', auth()->id())
                    ->with('user','category')
                    ->paginate(5);
    }

    return view('admin.post', compact('posts'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   
    $categories = Category::all();

    return view('admin.addPost', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    // Image Upload
    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/posts'), $imageName);
    }

    Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'user_id' => auth()->id(),
        'image' => $imageName
    ]);

    return redirect()->route('post.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)


    {

    $post = Post::with('user','category')->findOrFail($id);

    return view('single', compact('post'));
    // return $posts;
        
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $post = Post::findOrFail($id);

    // normal user only own post
    if(auth()->user()->role != 1 &&
       $post->user_id != auth()->id()){

        abort(403);
    }

    $categories = Category::all();

    return view('admin.updatePost', compact('post','categories'));
}
    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Post $post)
{
    // normal user only own post
    if(auth()->user()->role != 1 &&
       $post->user_id != auth()->id()){

        abort(403);
    }

    $post->update([
        'title' => $request->title,
        'description' => $request->description,
        'category_id' => $request->category_id
    ]);

    return redirect()->route('post.index');
}

    /**
     * Remove the specified resource from storage.
     */
 public function destroy($id)
{
    $post = Post::findOrFail($id);

    // only owner or admin
    if(auth()->user()->role != 1 &&
       $post->user_id != auth()->id()){

        abort(403);
    }

    $post->delete();

    return redirect()->route('post.index');
}

public function Allpost(){

    $posts = Post::with('user','category')->latest()->paginate(3);
    return view('welcome', compact('posts'));
}

public function tital(){

}


public function categoryshow(string $id)
{
    $posts = Post::with('user','category')
                ->where('category_id', $id)
                ->latest()
                ->paginate(3);

    return view('category', compact('posts'));
}
public function categoryheader(string $id)
{
    $posts = Post::with('user','category')
                ->where('category_id', $id)
                ->latest()
                ->paginate(3);

    return view('category', compact('posts'));
}

public function authorshow(string $id)
{
    $posts = Post::with('user','category')
                ->where('user_id', $id)
                ->latest()
                ->paginate(3);
    return view('author', compact('posts'));
}
public function search(Request $request)
{
    $search = $request->search;

    if (!$search) {
        $posts = Post::with('user','category')
                    ->latest()
                    ->paginate(3);
    } else {
        $posts = Post::with('user','category')
                    ->where('title', 'like', '%'.$search.'%')
                    ->latest()
                    ->paginate(3);
    }

    return view('search', compact('posts', 'search'));
}
public function sidebar(){

    $posts = Post::with('user','category')
                ->latest()
                ->limit(3)
                ->get();

    return view('sidebar', compact('posts'));
}
}