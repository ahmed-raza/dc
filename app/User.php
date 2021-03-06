<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rank',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    * A user can have many articles.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function ads(){
        return $this->hasMany('App\Ad');
    }

    /*
    * A user can have many articles.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function rank(){
        return $this->rank;
    }
}
