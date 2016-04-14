<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use \File;
use \Cache;

class Post extends Model {
	protected $fillable = [
		'title',
		'slug',
		'body',
		'description',
		'user_id',
	];

	public function user(){
	    return $this->belongsTo('\App\User');
	}

	public function categories(){
	    return $this->belongsToMany('\App\Category');
	}


	public function imageLink(){
	    return \URL::to($this->image);
	}

	public function link(){
	    return \URL::to('posts/'.$this->slug);
	}

	/**
	 * Upload ảnh và set cho Bài viết
	 * @param UploadedFile $uploadedFile
	 *
	 * @return bool
	 */
	public function setImage(UploadedFile $uploadedFile){


		$currenImage = public_path($this->image);

		$timeNow = Carbon::now();

		$fileExt = $uploadedFile->getClientOriginalExtension();
		$fileName = $timeNow->timestamp."-".str_slug($this->title).".".$fileExt;


		if(!File::isDirectory(public_path('posts'))){
			File::makeDirectory(public_path('posts'));
		}

		if(!File::isDirectory(public_path('posts/images'))){
			File::makeDirectory(public_path('posts/images'));
		}

		$uploadedFile->move(public_path('posts/images'),$fileName);

		if(File::isFile($currenImage)){
			File::delete($currenImage);
		}

		$this->image = 'posts/images/'.$fileName;
		$this->save();
		return true;
	}


	public function relatedPosts($number = 5){


		$CategoriesIdArray = $this->categories->lists('id')->toArray();

		$categoryPosts = \DB::table('category_post')
			->whereIn('category_id',$CategoriesIdArray)->get();

		$postsID = [];
		foreach($categoryPosts as $catPost){
			$postsID[] = $catPost->post_id;
		}

		return self::whereIn('id',$postsID)->orderBy('created_at','DESC')->take($number)->get();
	}


	public function setSlugAttribute($string){
	    $slug = str_slug($string);
		while(self::whereSlug($slug)->count()){
			$slug = strtolower(str_random(6))."-".$slug;
		}
		$this->attributes['slug'] = $slug;
	}

	public function getDescriptionAttribute(){
	    if(isset($this->attributes['description']) && !$this->attributes['description']){
		    return strip_tags($this->attributes['description']);
	    }else if(isset($this->attributes['body'])){
		    return strip_tags(str_limit($this->attributes['body'],400));
	    }
		return ;
	}

	//helpers functions
	public static function latestPosts($numer=5){
		return self::orderBy('created_at','DESC')->take($numer)->get();
	}




}
