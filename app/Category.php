<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable =[
	    'name',
	    'description',
    ];

	public function link(){
	    if(!$this->slug){
		    $this->slug = $this->name;
		    $this->save();
	    }
		return \URL::to('categories/'.$this->slug);
	}
    
	public function posts(){
	    return $this->belongsToMany('\App\Post');
	}

	public function setSlugAttribute($string){
		$slug = str_slug($string);
		while(self::whereSlug($slug)->count()){
			$slug = strtolower(str_random(6))."-".$slug;
		}
		$this->attributes['slug'] = $slug;
	}
}
