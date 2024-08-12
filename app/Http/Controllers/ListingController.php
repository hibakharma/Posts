<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  public function index(){

     $listings= Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
     // return $listings;
      return view('listings.index',compact('listings'));
  }
  public function show($id){

      $listing=Listing::find($id);
      return view('listings.show',compact('listing'));

  }
    public function create(){

        return view('listings.create');
    }
    public function store(Request $request ){
        Listing::create($request->all());
        return redirect('/');
    }
    public function edit($id ){
       $listing= Listing::findOrFail($id);
        return view('listings.edit',compact('listing'));
    }
    public function update(Request $request){
        $listing= Listing::findOrFail($request->id);
        $listing->update($request->all());
        return redirect('/');

    }
    public function destroy($id){
      Listing::findOrFail($id)->delete();
    }
}
