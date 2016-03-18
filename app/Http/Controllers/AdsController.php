<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdsPostRequest;
use App\Ad;
use App\Category;
use Auth;

class AdsController extends Controller
{
    public function __construct(){
      $this->middleware('auth', ['only'=>['create', 'edit', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('ads.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsPostRequest $request)
    {
        $ad = Auth::user()->ads()->create($request->all());
        $ad->categories()->attach($request->input('category_list'));
        return redirect('user/'.Auth::user()->id.'/ads')->with('message', 'Ad created successfully. Please wait for an admin to approve it.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('ads.show',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $categories = Category::lists('name', 'id');
        return view('ads.edit', compact('ad', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsPostRequest $request, $id)
    {
      $article = Ad::findOrFail($id);
      $article->update($request->all());
      $article->categories()->sync($request->input('category_list'));
      return redirect('user/'.Auth::user()->id.'/ads')->with('message', 'Ad updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ad = Ad::findOrFail($id);
      if (Auth::user()->id == $ad->user_id) {
        Ad::find($id)->delete();
        return redirect('user/'.Auth::user()->id)->with('message', 'Ad deleted.');
      }
      else{
        return redirect('user/'.Auth::user()->id)->with('error', 'You don\'t own that article');
      }
    }
}
