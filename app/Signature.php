<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    /**
     * [$fillable defines a fillable fields when are mass-assigned]
     * @var array
     */
    protected $fillable = ["name", "email", "body", "flagged_at"];
    
	 /**
	   * [scopeIgnoreFlagged ignore flagged signatures]
	   * 
	   * @param  $query
	   * @return mixed
	   */
  	public function scopeIgnoreFlagged($query){
  		return $query->where("flagged_at", null);
  	}

  	/**
  	 * [flag flag the given resource]
  	 * @return bool
  	 */
  	public function flag(){
  		return $this->update(["flagged_at" => \Carbon\Carbon::now()]);
  	}

  	/**
  	 * [getAvatarAttribute Get the user gravatar by email address]
  	 * @return string
  	 */
  	public function getAvatarAttribute(){
  		return sprintf("https://www.gravatar.com/avatar/%s?s=100", md5($this->email));
  	}
}
