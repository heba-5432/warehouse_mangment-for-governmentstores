<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\stores\StoreUser_ser;


use App\Exports\stores\StoreItems_ser;
use App\Models\stor_items\store_items;
use App\Exports\stores\StoreUsersearch;
use Illuminate\Support\Facades\Storage;
use App\Models\stor_items\Storeloan_items;
use App\Models\stor_items\Storestatus_items;
use App\Models\stor_items\Storecatgery_items;
use App\Models\stor_items\Storestatus2_items;
use App\Models\stor_items\store_corrupt_items;
use App\Models\stor_items\store_poor_storge_items;
use App\Models\stor_items\store_returned_used_items;
use App\Models\stor_items\codelist_store_itms;
class StoreItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    // Count the number of records in the table
    $ItemsCatogery =Storecatgery_items::count();
    $status_items  = Storestatus_items ::count();
    $status_items2  = Storestatus2_items ::count();
    $code_list_items= codelist_store_itms ::count();
    // Return 1 if table is empty, otherwise return 0 or any other logic




if (($ItemsCatogery==0)){
    Storecatgery_items::create([
        "ar_titlec"=>strtolower('public'),
        "En_titlec"=>strtolower('public'),
        "descriptionc"=>'public',
        "created_by"=>'system',

    ]);
}


if ($status_items==0){
    Storestatus_items::create([
        "ar_titles"=>strtolower('جديد'),
        "En_titles"=>strtolower('new'),
        "descriptions"=>'public',
        "created_by"=>'system',
    ]);
}

if ($status_items2==0){
    Storestatus2_items::create([
        "ar_titles2"=>strtolower('دائم'),
        "En_titles2"=>strtolower(' permanent'),
        "descriptions2"=>'public',
        "created_by"=>'system',
    ]);
}

if ($code_list_items==0){
    codelist_store_itms::create([
         "serial_numcla"=>strtolower('0'),
       "ar_titlecla"=>strtolower('public'),
        "En_titlecla"=>strtolower('public'),
        "descriptioncla"=>'public',
        "created_bycla"=>'system',
    ]);
}


$ItemsCatogery=Storecatgery_items::all();

$status_items = Storestatus_items::all();

$status_items2= Storestatus2_items::all();
$code_list_items=codelist_store_itms::all();
 $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
 ->leftJoin('codelist_store_itms','codelist_store_itms.id','=','store_items.items1_number')
 ->select('store_items.*','storecatgery_items.*','codelist_store_itms.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')->orderBy('store_items.created_at', 'desc')->get()

 ;


        return view('store_items\add_new_itemstore',compact('all_stores_items','ItemsCatogery','status_items','status_items2','code_list_items'));
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
            'title_ara'=>'Required','title_eng'=>'Required',
            'catogery_idi'=>'Required',
            'status_idi'=>'Required',
            'status_idi2'=>'Required',
'items1_number2'=>'Required',
'quantity'=>'Required|numeric',
            'cover_impatha'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
            'pdfa'=>'mimes:pdf,doc,docx|max:2240',
            'add_date'=>'Required',
                     // Each file must be PDF and less than 2MB
       ] );





        $foldername=$request->input('title_eng');   //file upload folder location name


       /* if ( $request->file('cover_impatha')){


         $imgname=$request->file('cover_impatha')->getClientOriginalName();

         $pathimg= $request->file('cover_impatha')->storeAs($foldername,$imgname,'storesfolder');


        }

        if ( $request->file('pdfa')){

            $pdfname=$request->file('pdfa')->getClientOriginalName();

            $pdfbath=$request->file('pdfa')->storeAs($foldername, $pdfname,'storesfolder');


           }*/



     $r = new store_items;
     $exits_item=$request['title_ara'];
     if(store_items::where('title_arai','=',$exits_item)->first()){

         return redirect('/items_store')->with('messege','item with same name been added before');
     }
     else{
        if ( $request->file('cover_impatha')){


            $imgname=$request->file('cover_impatha')->getClientOriginalName();

            $pathimg=  $request->file('cover_impatha')->storeAs($foldername,$imgname,'storesfolder');



    $r->imgpathi=$pathimg;
        }
        if ( $request->file('pdfa')){

            $pdfname=$request->file('pdfa')->getClientOriginalName();

            $pdfbath= $request->file('pdfa')->storeAs($foldername, $pdfname,'storesfolder');




        $r-> files_pathi= $pdfbath;
        }

        $r-> title_arai=strtolower($request->title_ara);
        $r-> title_engi=strtolower($request->title_eng);
        $r->seller_infoi=$request->seller;
        $r->request_owneri=$request->request_owner;
        $r->descriptioni=$request->purpose;
        $r->barcode_numberi=$request->barcode_number;
 $r->items1_number=$request->items1_number2;
$r->new_price=$request->new_price;
$r->still_exits2=$request->still_exitsn;

        $r->notice=$request->notice;
        $r->locationi=$request->location;
        $r->qauntatyi=$request->quantity;
        $r->current_qauntaty=$request->quantity;
$r->total_pricen= ($request->new_price * $request->quantity);
$r->current_total_pricen=($request->new_price * $request->quantity);
        $r->catogery_idi=$request->catogery_idi;
        $r->status_idi=$request->status_idi;
        $r->status2_idi =$request->status_idi2;
        $r->add_datei =$request->add_date;
        $r->created_by=Auth::User()->id;
       $f1 =$r->save();

if ($f1)
 {
    return redirect('/items_store')->with('messege','updated successfully');
 }
 else {
     return redirect('/items_store')->with('messege','not updated ,try again');
}

        //$id for  catogery of public  items add
}

}
   /**
        * Display the specified resource.

     */



    /**
     * Display the specified resource.
     */
    public function show()
    {

$Catogery = Storecatgery_items::all();

$Catogery2 = Storestatus_items::all();
$keies = Storestatus2_items::all();
$codelist =  codelist_store_itms::all();

 $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
 ->leftJoin('codelist_store_itms','codelist_store_itms.id','=','store_items.items1_number')
 ->select('store_items.*','storecatgery_items.*','codelist_store_itms.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')->get()

 ;




//return $results['item_all_show']; to only return one of the item in the aary
        // Return the view with results
       $users= User::all();

        // Get the search input
         return view('store_items/search_new_itemstore', compact('all_stores_items','users' ,'Catogery','keies','Catogery2','codelist'));
    }

 public function show2()
    {

$Catogery = Storecatgery_items::all();

$Catogery2 = Storestatus_items::all();
$keies = Storestatus2_items::all();


$users_loan=Storeloan_items ::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')

->select('users.*','storeloan_items.*','store_items.*','storeloan_items.id as loanid','users.id as usersdd')->get();




//return $results['item_all_show']; to only return one of the item in the aary
        // Return the view with results
       $users= User::all();

        // Get the search input
         return view('store_items/search_user_itemstore', compact('users_loan','users' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(store_items $store_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    { $request->validate([
        'title_ara'=>'Required','title_eng'=>'Required',
        'catogery_idi'=>'Required',
        'status_idi'=>'Required',
        'status_idi2'=>'Required',

'quantity'=>'Required|numeric',
        'cover_impatha'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
        'pdfa'=>'mimes:pdf,doc,docx|max:2240',
                 // Each file must be PDF and less than 2MB
   ] );





    $foldername=$request->input('title_eng');   //file upload folder location name


   /* if ( $request->file('cover_impatha')){


     $imgname=$request->file('cover_impatha')->getClientOriginalName();

     $pathimg= $request->file('cover_impatha')->storeAs($foldername,$imgname,'storesfolder');


    }

    if ( $request->file('pdfa')){

        $pdfname=$request->file('pdfa')->getClientOriginalName();

        $pdfbath=$request->file('pdfa')->storeAs($foldername, $pdfname,'storesfolder');


       }*/




       $r =  store_items::findOrFail($id);

       if (!empty( $request->file('cover_impatha'))){
          $request->validate([

           'cover_impatha'=>'mimes:png,jpeg,jpg,gif,jpg|max:1240', // 5MB max size
       ]);

           $imgname=$request->file('cover_impatha')->getClientOriginalName();

           $pathimg=  $request->file('cover_impatha')->storeAs($foldername,$imgname,'storesfolder');
    //return $pathimg;

   $r->imgpathi=$pathimg;
       }

      if (!empty( $request->file('pdfa'))){
           $request->validate([

               'pdfa'=>'mimes:pdf,doc,docx|max:2240',
        ]);

        $pdfname=$request->file('pdfa')->getClientOriginalName();


        $pdfbath=  $request->file('pdfa')->storeAs($foldername, $pdfname,'storesfolder');
     //return $pathimg;

    $r->files_pathi=$pdfbath;
      }



    $r-> title_arai=strtolower($request->title_ara);

    $r-> title_engi=strtolower($request->title_eng);
    $r->seller_infoi=$request->seller;
    $r->request_owneri=$request->request_owner;
    $r->descriptioni=$request->purpose;
     $r->locationi=$request->location;
    $r->barcode_numberi=$request->barcode_number;
 $r->items1_number=$request->items1_number2;
$r->new_price=$request->new_price;
$r->still_exits2=$request->still_exitsn;
    $r->notice=$request->notice;
    $r->locationi=$request->location;

    //التعديل على الكميه التى فى المخزن قيل اجراء عمليات عليها
if( $request->quantity!= $r->qauntatyi){

    if( $r->qauntatyi== $r->current_qauntaty){
 $r->qauntatyi=$request->quantity;
    $r->current_qauntaty=$request->quantity;
    $r->total_pricen= ($request->new_price * $request->quantity);
        $r->current_total_pricen= ($request->new_price * $request->quantity);
    }

   if( $r->qauntatyi!= $r->current_qauntaty){

return redirect()->back()->with('messege','لايمكن التعديل على الكميه المدخله للمخزن لان تم اجراء عمليات عليها ممكن ادخال المنتج كمنتج جديد');

    }

}
    $r->catogery_idi=$request->catogery_idi;
    $r->status_idi=$request->status_idi;
    $r->status2_idi =$request->status_idi2;
if(!empty($request->add_date)){
    $r->add_datei =$request->add_date;
}
    $r->edit_by=Auth::User()->id;
   $f1 =$r->save();

if ($f1)
{
return redirect('/items_store')->with('messege','updated successfully');
}
else {
 return redirect('/items_store')->with('messege','not updated ,try again');
}

    //$id for  catogery of public  items add
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $imgPath =store_items::where ('id',$id)->value('imgpathi');
if(!empty($imgPath )){
        if (Storage::disk('storesfolder')->exists($imgPath)) {
            // Delete the file
            Storage::disk('storesfolder')->delete($imgPath);

        }
        }

        $filePath =store_items::where ('id',$id)->value('files_pathi');
 if(!empty($filePath )){
        if (Storage::disk('storesfolder')->exists($filePath)) {
            // Delete the file
            Storage::disk('storesfolder')->delete($filePath);

        }
}

// delete all cahpter related to item


        $deleteditem= store_items::where('id', $id)->delete();

        if ( $deleteditem) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }




//////////////////////filter end////////////////////////////
  public function filter(request $request)
    {

$users=User::all();
$Catogery = Storecatgery_items::all();

$Catogery2 = Storestatus_items::all();
$keies = Storestatus2_items::all();
        // Get the search input

    $validated = $request->validate([
        'start_date' => 'nullable|date',
        'end_date'   => 'nullable|date|after_or_equal:start_date',
       // 'price_from'  => 'nullable|numeric',
       // 'price_to'    => 'nullable|numeric|gte:price_from',
        'filtercat1'       => 'nullable|string',
        'filtercat2' => 'nullable|string',
 'filterstatus' => 'nullable|string',
//'status' => 'nullable|string',
'users_info' => 'nullable|string',
'seller_info' => 'nullable|string',
'store_location' => 'nullable|string',
'new_price' => 'nullable|string',
'request_owner' => 'nullable|string',
'barcode' => 'nullable|string',
'itemi_number' => 'nullable|string',
'date_created'    => 'nullable|string',
    ]);

    $all_stores_items= store_items::query()->leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
 ->leftJoin('codelist_store_itms','codelist_store_itms.id','=','store_items.items1_number')
 ->when(!empty($request->input('start_date')), function ($q) use ($request) {
        $q->where('store_items.add_datei',  '>=',$request->start_date);
  })
 ->when(!empty($request->input('end_date')) , function ($q) use ($request) {
        $q->where('store_items.add_datei',  '<=', $request->end_date);
     })
->when(!empty($request->input('query')), function ($q) use ($request) {
        $q->where('store_items.title_arai', 'like', '%' . $request->input('query'). '%')
 ->orWhere('store_items.title_engi', 'like', '%' . $request->input('query') . '%');
  })


  ->when(!empty($request->input('filtercat1')), function ($q) use ($request) {
        $q->where('catogery_idi', $request->filtercat1);
  })
 ->when(!empty($request->input('filterstatus')) , function ($q) use ($request) {
        $q->where('status2_idi', $request->filterstatus);
     })

->when(!empty($request->input('filtercat2')), function ($q) use ($request) {
        $q->where('status_idi',  '=',$request->filtercat2);
  })
 ->when(!empty($request->input('seller_info')) , function ($q) use ($request) {
        $q->where('seller_infoi',  'like', $request->seller_info);
     })


  ->when(!empty($request->input('store_location')), function ($q) use ($request) {
        $q->where('locationi', 'like', '%' .$request->store_location);
  })
 ->when(!empty($request->input('barcode')) , function ($q) use ($request) {
        $q->where('barcode_numberi', $request->barcode);
     })

 ->when(!empty($request->input('itemi_number')) , function ($q) use ($request) {
        $q->where('items1_number', $request->itemi_number);
     })
->when(!empty($request->input('date_created')) , function ($q) use ($request) {
        $q->where('store_items.add_datei', $request->date_created);
     })

->when(!empty($request->input('new_price')) , function ($q) use ($request) {
        $q->where('new_price', $request->new_price);
     })

     ->when(!empty($request->input('request_owner')) , function ($q) use ($request) {
        $q->where('request_owneri', 'LIKE','%'.$request->request_owner.'%');
     })
    ->when(!empty($request->input('notice')) , function ($q) use ($request) {
        $q->where('notice', 'LIKE','%'.$request->notice.'%');
     })
->select('store_items.*','codelist_store_itms.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')

        ->get();

$curr_sum=$all_stores_items->sum('current_total_pricen');
$to_sum=$all_stores_items->sum('total_pricen');

$total_sum=[
'to_sum'=>$to_sum,
'curr_sum'=>$curr_sum,

];

//عstart دد العناصر بالمخزن لكل عدد حالى والفئات

$to_no=$all_stores_items->count();
$curr_no=$all_stores_items->sum('current_qauntaty');

$total_no=[
'to_no'=>$to_no,
'curr_no'=>$curr_no,

];

//end دد العناصر بالمخزن لكل عدد حالى والفئات


 //excel export search result start
 $results2= $all_stores_items;

 if ($request->has('exportitems')) {
        return Excel::download(new StoreItems_ser( $results2),  fileName: 'store_items.xlsx');
    }

 //excel export search result end

 //excel export search result start





   return view('store_items/search_new_itemstore', compact('total_no','total_sum','users','all_stores_items','Catogery','keies','Catogery2'));

}








//////////////////////filter end////////////////////////////


 public function search(request $request)
    {

    $validated = $request->validate([
        'query' => 'nullable|string',
    ]);

 $searchTerm = $request->input('query');


$Catogery = Storecatgery_items::all();

$Catogery2 = Storestatus_items::all();
$keies = Storestatus2_items::all();
  $users=User::all();



 $all_stores_items= store_items::query()->leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
 ->leftJoin('codelist_store_itms','codelist_store_itms.id','=','store_items.items1_number')

 ->when(!empty($request->input('query')), function ($q) use ($request) {
        $q->where('title_arai', 'like', '%' . $request->input('query'). '%')
 ->orWhere('title_engi', 'like', '%' . $request->input('query') . '%');
  })


->select('store_items.*','codelist_store_itms.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')->get()

 ;
           // Get the search input



$curr_sum=store_items::sum('current_total_pricen');
$to_sum=store_items::sum('total_pricen');

$total_sum=[
'to_sum'=>$to_sum,
'curr_sum'=>$curr_sum,

];

//عstart دد العناصر بالمخزن لكل عدد حالى والفئات

$to_no=$all_stores_items->count();
$curr_no=$all_stores_items->sum('current_qauntaty');

$total_no=[
'to_no'=>$to_no,
'curr_no'=>$curr_no,

];

//end دد العناصر بالمخزن لكل عدد حالى والفئات

//excel export search result end

 $results2= $all_stores_items;

 if ($request->has('exportitems_name')) {
        return Excel::download(new StoreItems_ser( $results2),  fileName: 'store_items_titles.xlsx');
    }

 //excel export search result end

 return view('store_items/search_new_itemstore', compact('total_no','total_sum','all_stores_items','users','Catogery','keies','Catogery2'));
    }


    public function filter2(request $request)
    {
//return $request;
 //   $query = $request->input('query');
$users=User::all();

      // $filter_items = $request->input('query');




$filter_items=[
//'filter_match'=> $request->input('excat_match'),

'user_info'=>$request->input('users_info'),


];
//return $filter_items;



//loan table start search


   // Combine results into an array


$users_loan=Storeloan_items::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')
->leftJoin('storestatus2_items','storestatus2_items.id','=','storeloan_items.statusi2')

 ->when(!empty($request->input('users_info')), function ($q) use ($request) {
   $q->where('users.id',  '=', $request->input('users_info' ));
 })
   ->when(!empty($request->input('query2')), function ($q) use ($request) {
        $q->where('parteners', 'like', '%' . $request->input('query2'). '%');
   })


->select('users.*','storeloan_items.*','store_items.*','storestatus2_items.*','storeloan_items.id as loanid','users.id as usersdd')

 ->get();

 //excel export search result start
 $results=$users_loan;

 if ($request->has('exportusers')) {
        return Excel::download(new StoreUser_ser( $results),  fileName:  $results->value('name').'.xlsx');
    }

 //excel export search result end

//return $results['item_all_show']; to only return one of the item in the aary
// Return the view with results
return view('store_items/search_user_itemstore', compact('users','users_loan'));

    }

 public function show_single_user_items()
    {

$Catogery = Storecatgery_items::all();

$Catogery2 = Storestatus_items::all();
$keies = Storestatus2_items::all();

$single_user_id=auth()->user()->id;
$single_user_name=auth()->user()->name;
$users_loan=Storeloan_items ::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')
->where('storeloan_items.userloan_id',$single_user_id)
->orWhere('storeloan_items.parteners','like','%'.$single_user_name.'%')
->select('users.*','storeloan_items.*','store_items.*','storeloan_items.id as loanid','users.id as usersdd')->get();




//return $results['item_all_show']; to only return one of the item in the aary
        // Return the view with results
       $users= User::all();

        // Get the search input
         return view('store_items\store_single_user_itemloans', compact('users_loan','users' ));
    }



 public function show_info($id)
    {
        $users=User::all();// user need to edit
        $ItemsCatogery=Storecatgery_items::all();

        $status_items = Storestatus_items::all();

        $status_items2= Storestatus2_items::all();
       $single_item= store_items ::where('store_items.id','=',$id)->get();

        $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
->leftJoin('codelist_store_itms','codelist_store_itms.id','=','store_items.items1_number')
 ->select('store_items.*','codelist_store_itms.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')
 ->get();




$Catogery = Storecatgery_items::all();

$Catogery2 = Storestatus_items::all();
$keies = Storestatus2_items::all();
        // Get the search input
$code_list_items=codelist_store_itms::all();
 $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
 ->leftJoin('codelist_store_itms','codelist_store_itms.id','=','store_items.items1_number')
->where('store_items.id',$id)
 ->select('store_items.*','codelist_store_itms.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')->get()

 ;





$single_item=$all_stores_items;





$users_items=Storeloan_items ::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')
->where('storeloan_items.item_store_id','=',$id)
->select('users.*','storeloan_items.*','store_items.*','storeloan_items.id as loanid','users.id as usersdd')->get();







 $sum1 =Storeloan_items::where('item_store_id','=',$id)->sum('number_currentis');
$sum2 =store_corrupt_items ::where('item_store_idc','=',$id)->sum('number_returnc');

$sum3=store_returned_used_items::where('item_store_idu','=',$id)->sum('used_curr_no');
$sum4=store_poor_storge_items::where('item_store_idp','=',$id)->sum('number_returnp');


//return response()->json(['total_value' => $sum]);
 $sum=[
    'item_loaned'=>$sum1,
    'corrupt_item'=>$sum2,
    'used_items4'=>$sum3,
    'poor_storage_items'=>$sum4,
 ];



          return view('store_items/search_new_itemstore', compact('single_item','all_stores_items','users','Catogery','keies','Catogery2','sum'));
    }



}




