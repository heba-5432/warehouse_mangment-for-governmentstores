<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\stor_items\Storestatus_items;

class StorestatusItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       {
$Itemsstat1=Storestatus_items::all();

      return view('store_items\store_items_status1',compact('Itemsstat1'));
}

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
'title_ars'=>'Required',
        ]);

$b_exit=$request['title_ars'];
if ( Storestatus_items::where('ar_titles','=', $b_exit)->first()) {
    return redirect('/items_store_status1')->with("messege","this item added before");
} else {
        $ItemsCatogery = Storestatus_items::create([
  "ar_titles"=>strtolower($request->title_ars),
 "En_titles"=>strtolower($request->title_engs),
 "descriptions"=>$request->descrptions,

 "created_by"=>(Auth::user()->id),

        ]);
        if ($ItemsCatogery){

  return redirect('/items_store_status1')->with("messege","saved succesfully");
        }
        else{
        return redirect('/items_store_status1')->with("messege","not saved, try again");
        }
}
    }
    /**
     * Display the specified resource.
     */
    public function show(Storestatus_items $storestatus_items)
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
    public function update(Request $request,$id)
    {

      $Items_update=Storestatus_items::findOrFail($id)->update([
       "ar_titles"=>strtolower($request->title_ars),
 "En_titles"=>strtolower($request->title_engs),
 "descriptions"=>$request->descrptions,

             "edit_by"=>(Auth::user()->name),

                       ]);
                 if($Items_update )
                      {

  return redirect('/items_store_status1')->with("messege","updated succesfully");
        }
        else{
        return redirect('/items_store_status1')->with("messege","not updated, try again");
        }

    /**
     * Remove the specified resource from storage.
     */
        }
         public function destroy($id)
    {
         $item_delete=Storestatus_items::findOrFail($id)->delete();

        if($item_delete )
        {
  return redirect('/items_store_status1')->with("messege","deleted succesfully");
     }
     else{
       return redirect('/items_store_status1')->with("messege","not deleted, try again");

  }
    }
}
