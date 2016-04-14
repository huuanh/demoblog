<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	    $posts = Post::orderBy('created_at','DESC')->paginate();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Post $post)
    {
        return view('admin.posts.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
	    $input = $request->all();
	    $input['slug'] = $request->get('title');

	    $post = Post::create($input);
	    if($request->file('image')){
		    $post->setImage($request->file('image'));
	    }
        return redirect()
	        ->route('admincp.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

	    $post->categories()->sync($request->get('categories'));

	    if($request->hasFile('image')){
		    $post->setImage($request->file('image'));
	    }

	    return redirect()
		    ->route('admincp.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
	    return redirect()
		    ->route('admincp.posts.index');
    }
}
