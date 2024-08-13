<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  public function index(){

     $listings= Listing::latest()->filter(request(['tag', 'search']))->Paginate(2);
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
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
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
