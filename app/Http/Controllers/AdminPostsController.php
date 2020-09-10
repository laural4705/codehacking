<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\PostCreateRequest;
//use App\Http\Requests\AdminUsersUpdateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $user->posts()->create($input);
        //User::create($request->all());
        //return $adminUsersRequest->all();
        Session::flash('created_post', 'Post has been created.');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        //$categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit');
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
        $post = Post::findOrFail($id);
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            //create Photo
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->update($input);
        Session::flash('updated_post', 'Post has been updated.');
        return redirect('/admin/posts');
        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFAil($id);
        unlink(public_path() . $post->photo->file);
        $user->posts()->delete();
        Session::flash('deleted_post', 'Post has been deleted.');
        return redirect('admin/posts');
    }
}
