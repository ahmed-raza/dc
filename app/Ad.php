<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  protected $fillable = [
    'title',
    'city',
    'description',
    'approve',
    'status'
  ];
  protected $attributes = [
   'approve' => 0,
   'status'  => 0,
  ];
  protected $casts = [
   'approve' => 'boolean',
   'status'  => 'boolean',
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
  public function unapprovedAds(){
    return dd($this);
  }
}
