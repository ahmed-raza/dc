<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SearchRequest;
use App\Ad;
use Auth;

class AdminController extends Controller
{
  public function __construct(){
      $this->middleware('auth', ['only'=>['create', 'edit', 'delete', 'index']]);
  }
  public function ads(SearchRequest $request){
    if ($request->isMethod('post') && Auth::check() && Auth::user()->rank == 'admin') {
      $title = $request->get('title');
      $approve = $request->get('approve');
      $ads = Ad::where('title','like','%'.$title.'%')->where('approve', $approve)->orderBy('title')->paginate(20);
      return view('admin.ads', compact('ads'));
    }
    $ads = Ad::orderBy('title')->paginate(15);
    if (Auth::check() && Auth::user()->rank == 'admin') {
      return view('admin.ads', compact('ads'));
    }
    else{
      return abort(403, 'Unauthorized action.');
    }
  }
}
