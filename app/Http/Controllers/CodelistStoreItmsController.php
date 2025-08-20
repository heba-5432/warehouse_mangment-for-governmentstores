<?php

namespace App\Http\Controllers;

use import;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\stores\store_code_export;
use App\Imports\stores\store_code_import;
use App\Models\stor_items\codelist_store_itms;

class CodelistStoreItmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
$Itemscodelist=codelist_store_itms::all()->orderBy('title_ar');

      return view('store_items/store_codelist',compact('Itemscodelist'));
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


$b_exit=$request['title_ar'];
if (codelist_store_itms::where('ar_titlecla','=', $b_exit)->first()) {
    return redirect('/code_list_items')->with("messege","this item added before");
} else {
        $Itemscodelist = codelist_store_itms::create([
       "serial_numcla"  => strtolower($request->serialnum),
           "ar_titlecla"=>strtolower($request->title_ar),
 "En_titlecla"=>strtolower($request->title_eng),
 "descriptioncla"=>$request->descrption,
"created_bycla"=>(Auth::user()->name),

        ]);
        if ($Itemscodelist){

  return redirect('/code_list_items')->with("messege","saved succesfully");
        }
        else{
        return redirect('/code_list_items')->with("messege","not saved, try again");
        }
    /**
     * Display the specified resource.
     */
}
    }

    /**
     * Display the specified resource.
     */
    public function show(codelist_store_itms $codelist_store_itms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(codelist_store_itms $codelist_store_itms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $Items_update= codelist_store_itms::findOrFail($id)->update([
            "serial_numcla"  => strtolower($request->serialnum),
           "ar_titlecla"=>strtolower($request->title_ar),
 "En_titlecla"=>strtolower($request->title_eng),
 "descriptioncla"=>$request->descrption,
// "created_bycla"=>(Auth::user()->name),
             "edit_bycla"=>(Auth::user()->name),

                       ]);
                 if($Items_update )
{


  return redirect('/code_list_items')->with("messege","updated succesfully");
        }
        else{
        return redirect('/code_list_items')->with("messege","not updated, try again");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item_delete=codelist_store_itms::findOrFail($id)->delete();

        if($item_delete )
        {
  return redirect('/code_list_items')->with("messege","deleted succesfully");
     }
     else{
       return redirect('/code_list_items')->with("messege","not deleted, try again");

  }
    }
       public function codesexport()
    {
        return Excel::download(new store_code_export, 'stores_code_list.xlsx');
    }

 public function codesimport(Request $request)
    {
            $request->validate([
            'code_storeupload'=>' required|mimes:xls,xlsx|max:5240', // 5MB max size
             'serial ing|max:255',
          //  'email'=> 'string|max:255|unique:users',
            'national_id'=>'unique:users',

       ] );

        Excel::import(new store_code_import,$request->file('code_storeupload'), \Maatwebsite\Excel\Excel::XLSX);

        return redirect('/code_list_items')->with('messege', ' uploades succesfully');
    }

}
