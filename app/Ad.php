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
  public function categories(){
    return $this->belongsTo('App\Category');
  }
}
