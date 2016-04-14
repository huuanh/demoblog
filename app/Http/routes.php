<?php

Route::get('/', [
	'as'=>'home',
	'uses'=>'PagesController@home'
]);
Route::get('/posts/{slug}', [
	'as'=>'posts.show',
	'uses'=>'PagesController@post'
]);

Route::get('/categories/{slug}', [
	'as'=>'categories.show',
	'uses'=>'PagesController@category'
]);


Route::get('theme',function(){
	return view('pages.home');
});

Route::get('testing',function(){
	foreach(\App\Category::all() as $cat){
		$cat->slug = $cat->name;
		$cat->save();
	}
	return "Done!";
});

Route::controller( 'pages', 'PagesController' );

Route::controller('auth','Auth\AuthController');

Route::group( [ 'middleware' => 'auth' ,'prefix'=>'admincp'], function () {
	Route::model('posts','App\Post');
	Route::resource('posts','Admin\PostsController');

	Route::get('/',[
		'as'=>'admin.home',
		'uses'=>'Admin\PagesController@dashbroad',
	]);

	Route::model('categories','App\Category');
	Route::resource('categories','Admin\CategoriesController');

} );

