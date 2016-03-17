<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class UserController extends Controller
{
  public function profile($id){
    $user = User::findOrFail($id);
    return view('user.profile', compact('user'));
  }
  public function myAds($id){
    if (Auth::user()) {
      $user = User::findOrFail($id);
      return view('user.ads', compact('user'));
    }
    else{
      return abort(401);
    }
  }
}
