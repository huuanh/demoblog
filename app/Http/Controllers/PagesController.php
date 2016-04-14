<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller {
	public function home() {
		$posts = Post::orderBy( 'created_at', 'DESC' )->paginate( 5 );

		return view( 'pages.home', compact( 'posts' ) );
	}

	public function getAbout() {
		return view( 'pages.about' );
	}

	public function getContact() {
		return view( 'pages.contact' );
	}


	public function category( $slug ) {
		$category = Category::whereSlug( $slug )->first();
		if ( $category ) {
			return view('layouts.category',compact('category'));
		}else{
			return "Not Found";
		}

	}

	public function post( $slug ) {
		$post = Post::whereSlug( $slug )->first();
		if ( $post ) {
			return view('layouts.post',compact('post'));
		}else{
			return "Not Found";
		}

	}

}
