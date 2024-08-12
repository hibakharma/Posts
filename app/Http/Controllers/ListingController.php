<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  public function index(){

      $listings=Listing::all();
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

        Listing::create($request->all());
        return redirect('/');

    }
}
