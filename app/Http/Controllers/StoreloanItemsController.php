<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\stor_items\store_items;
use Illuminate\Support\Facades\Storage;
use App\Models\stor_items\Storeloan_items;
use App\Models\stor_items\Storestatus_items;
use App\Models\stor_items\Storecatgery_items;
use App\Models\stor_items\Storestatus2_items;
use App\Models\stor_items\store_corrupt_items;
use App\Models\stor_items\store_poor_storge_items;
use App\Models\stor_items\store_returned_used_items;
use App\Exports\stores\sngle_item_users_ser;
class StoreloanItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()


    {

 $users=User::all();// user need to edit
        $ItemsCatogery=Storecatgery_items::all();

        $status_items = Storestatus_items::all();

        $status_items2= Storestatus2_items::all();
     //  $single_item= store_items ::where('store_items.id','=',$id)->get();

        $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')

 ->select('store_items.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid',)
 ->get();

$users_items=Storeloan_items ::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')
->select('users.*','storeloan_items.*','store_items.*','storeloan_items.id as loanid','users.id as usersdd','store_items.id as storeitid')->orderBy('name', 'desc')->get();


 return view('store_items\all_storeitem_user',compact( 'users','all_stores_items','ItemsCatogery','status_items','status_items2','users_items'));
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
            'store_items'=>'Required',
            'users_loan'=>'Required',
            'items_number'=>'Required|numeric',
            'department'=>'Required',
//'loan_date'=>'Required',
// Each file must be PDF and less than 2MB
       ] );

// calculate the remain item in stors is availble to request one of them
       $single_item= store_items::where('store_items.id','=',$request->store_items)->value('current_qauntaty');
       $status2=store_items::where('store_items.id','=',$request->store_items)->value('status2_idi');
$price_item=store_items::where('store_items.id','=',$request->store_items)->value('new_price');


$z= new  Storeloan_items;

$z->item_store_id=$request->store_items;

$users_name= $request->input('users_name');
$z->userloan_id= $request->input('users_loan');
if(!empty($users_name)){
$z->parteners=implode(',',$users_name);
}
if (($single_item - $request->items_number) < 0){
    return back()->with ('messege','العدد '.  $request->items_number.' غير متوافر حاليا بالمخزن' .'العدد الحالى'.$single_item);
}

    $z->number_itemsi=$request->items_number;




$z->departmentis=$request->department;
$z->loan_date=$request->recieved_date;
$z->statusi2= $status2;
$z->number_currentis=$request->items_number;
/*$z->returned_date=$request->returned_date;
$z->number_returnedis=$request->returned_number;
$z->status_returned=$request->status_returned;
$z->user2_loan_id=$request->user2_loan;
$z->status_to_user2=$request->status_returned2;*/
$z->noticeis=$request->notices;
$t=$z->save();
// deduct from current number in store after saving reqeust

if($t )
{
    $current_items=store_items::where('store_items.id','=',$request->store_items)->value('current_qauntaty');
    $current_items_new=($current_items - $request->items_number);
   $g= store_items::where('store_items.id','=',$request->store_items)->update([
       'current_qauntaty'=>$current_items_new,
        'current_total_pricen'=>$current_items_new * $price_item,
   ]);
   if($g)
    return redirect()->back()->with('messege','saved succesfully');

if( !$g ) {

    return redirect()->route('store_items.add_user',$request->items_number)->with('messege','تم الحفظ لكن لم يتم النقص من المخزن');

}
}
if(!$t){
    return redirect()->route('store_items.add_user',$request->items_number)->with('messege','error not saved');

}
    }

    /**
     * Display the specified resource.
     */
    public function show(request $request, $id)
    {
        $users=User::all();// user need to edit
        $ItemsCatogery=Storecatgery_items::all();

        $status_items = Storestatus_items::all();

        $status_items2= Storestatus2_items::all();
       $single_item= store_items ::where('store_items.id','=',$id)->get();


$single_status=store_items::leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
->where('store_items.id','=',$id)
 ->select('store_items.*','storestatus2_items.*',
 'storestatus2_items.id as status2.id'
 )->get();



        $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
->where('store_items.id','=',$id)
 ->select('store_items.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid',
 'storestatus2_items.id as status2.id'
 )
 ->get();

$users_items=Storeloan_items ::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')
->where('storeloan_items.item_store_id','=',$id)
->select('users.*','storeloan_items.*','store_items.*','storeloan_items.id as loanid','users.id as usersdd')->orderBy('users.name')->get();



 //excel export search result start
 $results2= $users_items;

 if ($request->has('export_singleitems')) {
        return Excel::download(new sngle_item_users_ser( $results2),  fileName: 'store_items.xlsx');
    }

 //excel export search result end






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

/////////////////////////////////
/*
$data = $users_items->pluck('userloan_id'); // this is a string in an array
$ids = [];

foreach ($data as $item) {
    // If item is a string and contains ',', split it
    if (is_string($item) && str_contains($item, ',')) {
        $ids = array_merge($ids, explode(',', $item));
    } else {
        // Single ID (number or numeric string)
        $ids[] = $item;
    }
}
// Optionally convert to int
//$ids = array_map('intval', $ids);

// Get user names
$userNames = User::whereIn('id', $ids)->pluck('name')->toArray();


return $userNames;
}*/
//////////////////////////////////

        return view('store_items\add_storeitem_user',compact( 'single_status','users','all_stores_items','single_item','ItemsCatogery','status_items','status_items2','users_items','sum'));
}


    /**
     * Show the form for editing the specified resource.
     */

public function export_single_items_owners($id)
{


      $users=User::all();// user need to edit
        $ItemsCatogery=Storecatgery_items::all();

        $status_items = Storestatus_items::all();

        $status_items2= Storestatus2_items::all();
       $single_item= store_items ::where('store_items.id','=',$id)->get();


$single_status=store_items::leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
->where('store_items.id','=',$id)
 ->select('store_items.*','storestatus2_items.*',
 'storestatus2_items.id as status2.id'
 )->get();



        $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
 ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
 ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
->where('store_items.id','=',$id)
 ->select('store_items.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid',
 'storestatus2_items.id as status2.id'
 )
 ->get();

$users_items=Storeloan_items ::leftJoin('users','storeloan_items.userloan_id','=','users.id')
->leftJoin('store_items','storeloan_items.item_store_id','=','store_items.id')
->where('storeloan_items.item_store_id','=',$id)
->select('users.*','storeloan_items.*','store_items.*','storeloan_items.id as loanid','users.id as usersdd')->get();



 //excel export search result start
 $results2= $users_items;

        return Excel::download(new sngle_item_users_ser ( $results2),  fileName: $users_items->value('title_arai').'.xlsx');
//excel export
}




    public function edit(Storeloan_items $storeloan_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $single_item= store_items::where('store_items.id','=',$request->store_items)->value('current_qauntaty');
        $current_items=store_items::where('store_items.id','=',$request->store_items)->value('current_qauntaty');
$price_item=store_items::where('store_items.id','=',$request->store_items)->value('new_price');


        $z= Storeloan_items::find($id);

//الفكره كلها ان العدد الحالى الموجود بالمخزن هو ما تبقى من ما تم حفظه من قبل وبالتالى
 //لو تم تعديل الرقم مره اخري لابد من رده من خصمه لكى يتم الخصم على العدد الصحيح للمخزن

        $z->item_store_id=$request->store_items;
        $z->userloan_id=$request->users_loan;

        if($z->edit_disabled != 1){
        if (($single_item - $request->items_number) < 0){
            return back()->with ('messege','العدد '.  $request->items_number.' غير متوافر حاليا بالمخزن' .'العدد الحالى'.$single_item);
        }

        $stored_number=$z->number_itemsi;
        $requested_number=$request->items_number;

        if($requested_number > $stored_number){
            $newvalue=($requested_number-$stored_number);
            $current_items_new=($current_items - $newvalue);
            $g= store_items::where('store_items.id','=',$request->store_items)->update([
                'current_qauntaty'=>$current_items_new,
                 'current_total_pricen'=>$current_items_new * $price_item,
            ]);
        }


        if($requested_number < $stored_number){
            $newvalue=($stored_number-$requested_number);
            $current_items_new=($current_items + $newvalue);
            $g= store_items::where('store_items.id','=',$request->store_items)->update([
                'current_qauntaty'=>$current_items_new,
                'current_total_pricen'=>$current_items_new * $price_item,
            ]);
        }
        ///نهايه الخصم واستعاده العناصر من المخزن
            $z->number_itemsi=$request->items_number;
            $z->number_currentis=$request->items_number;

    }



        $z->departmentis=$request->department;
        $z->loan_date=$request->recieved_date;


        /*$z->returned_date=$request->returned_date;
        $z->number_returnedis=$request->returned_number;
        $z->status_returned=$request->status_returned;
        $z->user2_loan_id=$request->user2_loan;
        $z->status_to_user2=$request->status_returned2;*/
        $z->noticeis=$request->notices;
        $t=$z->save();


        if($t )
        {


            return redirect()->back()->with('messege','updated succesfully');


        }

        if(!$t){
            return redirect()->route('store_items.add_user',$request->items_number)->with('messege','error not updated');

        }






    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
// id is for table item store loan user
$j=Storeloan_items::where('id' ,'=',$id)->get();

if (!empty($j->value('item_owner'))){
    return redirect()->back()->with('messege',' not deleted,لانه معه عناصر تم استعارتها من شخص اخر ونقلها اليه  ');
    }

   elseif(($j->value('edit_disabled')==1)|| (($j->value('item_owner') == 1))){
    return redirect()->back()->with('messege',' not deleted,لانه معه  منتجات تم التعامل معها من قبل  ');

    }
else{

$items_loan_current=$j->value('number_currentis');
//return $items_loan_current;

$store_item_id=$j->value('item_store_id');
     // return   $store_item_id;

// add item deleted


        $current_items=store_items::where('store_items.id','=',$store_item_id)->value('current_qauntaty');
$price_item=store_items::where('store_items.id','=',$store_item_id)->value('new_price');

        $current_items_new= ($current_items+$items_loan_current);
$g= store_items::where('store_items.id','=',$store_item_id)->update([
    'current_qauntaty'=>$current_items_new,
    'current_total_pricen'=>$current_items_new * $price_item,
]);

//return $current_items_new;


  If($g){
  $i=Storeloan_items::where('id',$id)->delete();
    if ($i)
    {
        return redirect()->back()->with('messege','deleted succesfully');

    }
    if(!$i)
    {
        return redirect()->back()->with('messege',' not deleted,try again ');
    }


    }
    if(!empty($j->item_owner)){
    return redirect()->back()->with('messege',' not deleted,لانه معه عناصر تم استعارتها من شخص اخر ونقلها اليه  ');

    }
}
    }

    public function return(Request $request,$id)
    {


        $z= Storeloan_items::find($id);
// given

$item_id=$z->item_store_id;


//given
        $z->returned_date=$request->returned_date;
        $z->number_returnedis=$request->returned_number;

        $stored_number=$z->number_currentis;


        if($request->returned_number >$stored_number){
            return back()->with ('messege','العدد '.  $request->returned_number.'العدد اكبر من العهده المطلوب استرجاعه');

        }


       // $z->number_currentis= ($stored_number -$request->returned_number);
       if($request->status_returned =='add_to_user2')
       {
       if(empty($request->user2_loan)){
        return back()->with ('messege','لابد من ادخال اسم المنقول له العهدة');
    }
    if(!empty($request->user2_loan)){
        $z->status_returned=$request->status_returned;
        $z->user2_loan_id= $request->user2_loan;
        $z->noticeis=$request->notices;
        $tu5=$z->save();

// option for choosind add item to anther user/////////////////////////////////


// calculate the remain item in stors is availble to request one of them
if($tu5){
    $z3= Storeloan_items::find($id);
// given
Storeloan_items::find($id)->update([
    'edit_disabled'=>1,
]);
$item_id=$z3->item_store_id;

if (!empty($z3->user2_loan_id))
{
    if($z3->status_returned=='add_to_user2')
    {

$user2_request=$z3->user2_loan_id;

$l= new  Storeloan_items;

$l->item_store_id=$item_id;
$l->userloan_id= $z3->user2_loan_id;

    $l->number_itemsi=$z3->number_returnedis;

$l->loan_date=$z3->returned_date;

$l->number_currentis=$z3->number_returnedis;
$l->item_owner=$z3->userloan_id;
$l->owner_itm_no=$z3->number_returnedis;
$l->used_price_item=$request->used_price;
$l->total_prc=($request->used_price * $request->returned_number);
$t1=$l->save();

if($t1){
    $z= Storeloan_items::find($id);
    $z->number_currentis= ($stored_number -$request->returned_number);
   // $z->status_returned=$request->status_returned;
    $z->user2_loan_id=$request->user2_loan;
    $z->status_to_user2=$request->status_returned2;
    $z->noticeis=$request->notices;
    $t=$z->save();




return redirect()->route('store_items.add_user',$item_id)->with('messege',' updated');
}
}

    }
}
    }
if (!$tu5)
   {

return redirect()->route('store_items.add_user',$item_id)->with('messege','items returned add to another user ');

   }
    }


// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////


// لاسترجاع عهدة تالفه او كهن
if($request->status_returned !='add_to_user2'){
        $z->status_returned=$request->status_returned;
     $z->number_currentis= ($stored_number -$request->returned_number);
     $z->edit_disabled=1;
     // العدد الحالى بعد استرجاع الكهنه
     $z->noticeis=$request->notices;
     $tu=$z->save();
}

     //   $z->user2_loan_id=$request->user2_loan;
      //  $z->status_to_user2=$request->status_returned2;



// in case of returned items is corrupted start//////////////////////

$g= Storeloan_items::find($id);



if($g->status_returned=='corrupt')
{

    $item_id= $g->item_store_id;

    $c= new  store_corrupt_items;

   $c->item_store_idc = $g->item_store_id;
   $c->item_ownerc = $g->userloan_id;
   $c->number_returnc=$g->number_returnedis;
   $c->curr_no_corrupted=$g->number_returnedis;
$c->pricec_one =$request->used_price;
$c->corr_price=$request->used_price * $request->returned_number;
   $c->returned_datec=$g->returned_date ;
   $c->statusc="corrupted";
   $tc=$c->save();
   if ($tc)
   {

return redirect()->route('store_items.add_user',$item_id)->with('messege','item retrneed to currpted table');

   }
   if (!$tc)
   {

return redirect()->route('store_items.add_user',$item_id)->with('messege','item didnot retrneed to currpted table ');

   }

}

// in case of returned items is corrupted end////////////////////////



// in case of returned itesm is reusable start////////////////////




$g1= Storeloan_items::find($id);



if($g1->status_returned=='usedf')
{

    $item_id= $g1->item_store_id;

    $c1= new  store_returned_used_items;

   $c1->item_store_idu = $g1->item_store_id;
   $c1->item_owneru = $g1->userloan_id;
   $c1->number_returnu=$g1->number_returnedis;
    $c1->used_curr_no=$g1->number_returnedis;
   $c1->returned_dateu=$g1->returned_date ;
   $c1->statusu="used";
   $c1->used_price=$request->used_price;
   $tc1=$c1->save();
   if ($tc1)
   {

return redirect()->route('store_items.add_user',$item_id)->with('messege','item retrneed to used table');

   }
   if (!$tc)
   {

return redirect()->route('store_items.add_user',$item_id)->with('messege','item didnot retrneed to currpted table ');

   }

}


// in case of returned itesm is reusableend//////////////////////

// in case of returned items add to anther user



}



}
