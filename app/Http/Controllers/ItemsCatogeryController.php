<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\library\ItemsCatogery;
use App\Http\Requests\StoreItemsCatogeryRequest;
use App\Http\Requests\UpdateItemsCatogeryRequest;

class ItemsCatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Catogery = ItemsCatogery::all();
        return view('libray_system/items_catogery',compact('Catogery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemsCatogeryRequest $request)
    {


$b_exit=$request['title_ar'];
if ( ItemsCatogery::where('ar_title','=', $b_exit)->first()) {
    return redirect('/catogery')->with("messege","this item added before");
} else {
        $ItemsCatogery = ItemsCatogery::create([
 "ar_title"=>strtolower($request->title_ar),
 "En_title"=>strtolower($request->title_eng),
 "description"=>$request->descrption,
 "created_by"=>(Auth::user()->name),

        ]);
        if ($ItemsCatogery){

  return redirect('/catogery')->with("messege","saved succesfully");
        }
        else{
        return redirect('/catogery')->with("messege","not saved, try again");
        }
    /**
     * Display the specified resource.
     */
}
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemsCatogery $itemsCatogery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemsCatogery $itemsCatogery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemsCatogeryRequest $request, $id)
    {

        $Items_update= ItemsCatogery::findOrFail($id)->update([
           "ar_title"=>strtolower($request->title_ar),
 "En_title"=>strtolower($request->title_eng),
 "description"=>$request->descrption,
 "created_by"=>(Auth::user()->name),
             "edit_by"=>(Auth::user()->name),

                       ]);
                 if($Items_update )
                      {
                        return redirect('/catogery')->with("messege","updated succesfully");
                   }
                   else{
                    return redirect('/catogery')->with("messege","not updated, try again");

                }
            }

                /**
                 * Remove the specified resource from storage.
                 */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item_delete=ItemsCatogery::findOrFail($id)->delete();

        if($item_delete )
        {
  return redirect('/catogery')->with("messege","deleted succesfully");
     }
     else{
       return redirect('/catogery')->with("messege","not deleted, try again");

  }

    }
}
