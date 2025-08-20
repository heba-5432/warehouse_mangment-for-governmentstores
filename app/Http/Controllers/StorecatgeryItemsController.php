<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\stor_items\Storecatgery_items;

class StorecatgeryItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
$ItemsCatogery=Storecatgery_items::all();

      return view('store_items\store_items_catogery',compact('ItemsCatogery'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
'title_arc'=>'Required',
        ]);

$b_exit=$request['title_arc'];
if ( Storecatgery_items::where('ar_titlec','=', $b_exit)->first()) {
    return redirect('/items_store_catogery')->with("messege","this item added before");
} else {
        $ItemsCatogery = Storecatgery_items::create([
 "ar_titlec"=>strtolower($request->title_arc),
 "En_titlec"=>strtolower($request->title_engc),
 "descriptionc"=>$request->descrptionc,
 "created_by"=>(Auth::user()->id),

        ]);
        if ($ItemsCatogery){

  return redirect('/items_store_catogery')->with("messege","saved succesfully");
        }
        else{
        return redirect('/items_store_catogery')->with("messege","not saved, try again");
        }
    /**
     * Display the specified resource.
     */
}
    }



    /**
     * Display the specified resource.
     */
    public function show( request $request,$id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Storecatgery_items $storecatgery_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

      $Items_update= Storecatgery_items::findOrFail($id)->update([
         "ar_titlec"=>strtolower($request->title_arc),
 "En_titlec"=>strtolower($request->title_engc),
 "descriptionc"=>$request->descrptionc,

             "edit_by"=>(Auth::user()->name),

                       ]);
                 if($Items_update )
                      {

  return redirect('/items_store_catogery')->with("messege","updated succesfully");
        }
        else{
        return redirect('/items_store_catogery')->with("messege","not updated, try again");
        }
                }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $item_delete=Storecatgery_items::findOrFail($id)->delete();

        if($item_delete )
        {
  return redirect('/items_store_catogery')->with("messege","deleted succesfully");
     }
     else{
       return redirect('/items_store_catogery')->with("messege","not deleted, try again");

  }

    }
}
