<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdsPostRequest;
use App\Ad;
use App\Category;
use Auth;
use DB;

class AdsController extends Controller
{
    public function __construct(){
      $this->middleware('auth', ['only'=>['create', 'edit', 'delete']]);
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
        if ($request->file('images') != null) {
            $images = $request->file('images');
            $image_names = "";
            foreach ($images as $key => $value) {
                $imageName = $request->get('title') . "_" . time() . "_(". $key .").". $value->getClientOriginalExtension();
                $imagePath = base_path() . '/public/images/ads/'.$ad->id.'/';
                $value->move($imagePath, $imageName);
                $image_names .= $imageName.",";
            }
        }
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
        if($ad->user['id'] == Auth::user()->id || Auth::user()->rank == 'admin'):
            return view('ads.edit', compact('ad', 'categories'));
        else:
            return back()->with('error', 'You are not authorize to access that page.');
        endif;
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
      $ad = Ad::findOrFail($id);
      $ad->update($request->all());
      $ad->categories()->sync($request->input('category_list'));
      return redirect('ad/'.$id)->with('message', 'Ad updated.');
    }

    /**
     * Returns confirmation page for deleting an Ad.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        if($ad->user['id'] == Auth::user()->id || Auth::user()->rank == 'admin'):
            return view('ads.delete', compact('ad'));
        else:
            return back()->with('error', 'You are not authorize to access that page.');
        endif;
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
      $auther_id = $ad->user->id;
      if (Auth::user()->id == $ad->user_id || Auth::user()->rank == 'admin') {
        Ad::find($id)->delete();
        if (is_dir(base_path().'/public/images/ads/'.$id)) {
            $dirPath = base_path().'/public/images/ads/'.$id.'/';
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir(base_path().'/public/images/ads/'.$id);
        }
        return redirect('user/'.$auther_id.'/ads')->with('message', 'Ad deleted.');
      }
      else{
        return redirect('user/'.Auth::user()->id)->with('error', 'You don\'t own that article');
      }
    }
}
