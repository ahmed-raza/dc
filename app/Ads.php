<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'title',
        'category',
        'city',
        'description',
    ];
    /**
    * An ad is owned by a user.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user(){
      return $this->belongsTo('App\User');
    }
}
