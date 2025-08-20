<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\stor_items\Storestatus2_items;

class Storestatus2ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

$Itemsstat2= Storestatus2_items::all();

      return view('store_items\store_items_status2',compact('Itemsstat2'));
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
'title_ars2'=>'Required',
        ]);

$b_exit=$request['title_ars2'];
if ( Storestatus2_items::where('ar_titles2','=', $b_exit)->first()) {
    return redirect('/items_store_status1')->with("messege","this item added before");
} else {
        $ItemsCatogery = Storestatus2_items::create([
   "ar_titles2"=>strtolower($request->title_ars2),
 "En_titles2"=>strtolower($request->title_ars2),
 "descriptions2"=>$request->descrptions2,

 "created_by"=>(Auth::user()->id),

        ]);
        if ($ItemsCatogery){

  return redirect('/items_store_status2')->with("messege","saved succesfully");
        }
        else{
        return redirect('/items_store_status2')->with("messege","not saved, try again");
        }
}
    }
    /**
     * Display the specified resource.
     */
    public function show(Storestatus2_items $Storestatus2_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request ,$id)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Items_update=Storestatus2_items::findOrFail($id)->update([
      "ar_titles2"=>strtolower($request->title_ars2),
 "En_titles2"=>strtolower($request->title_ars2),
 "descriptions2"=>$request->descrptions2,


             "edit_by"=>(Auth::user()->name),

                       ]);
                 if($Items_update )
                      {

  return redirect('/items_store_status2')->with("messege","updated succesfully");
        }
        else{
        return redirect('/items_store_status2')->with("messege","not updated, try again");
        }
                }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $item_delete=Storestatus2_items::findOrFail($id)->delete();

        if($item_delete )
        {
  return redirect('/items_store_status2')->with("messege","deleted succesfully");
     }
     else{
       return redirect('/items_store_status2')->with("messege","not deleted, try again");

  }
    }
}
