<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  protected $fillable = [
    'title',
    'city',
    'description'
  ];
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function categories(){
    return $this->belongsToMany('App\Category');
  }
  /**
  * Get a list of tag ids associated with the current article.
  *
  * @return array
  */
  public function getCategoryListAttribute(){
    return $this->categories->lists('id')->all();
  }
}
