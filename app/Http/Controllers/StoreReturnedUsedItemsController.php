<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\stor_items\store_items;
use App\Models\stor_items\Storeloan_items;
use App\Models\stor_items\store_returned_used_items;

class StoreReturnedUsedItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $reused_items=store_returned_used_items::leftJoin('store_items','store_returned_used_items.item_store_idu','=','store_items.id')
        ->leftJoin('users','store_returned_used_items.item_owneru','=','users.id')
         ->select('store_items.*','users.*','store_returned_used_items.*','store_returned_used_items.id as used_it_id', 'users.id as users_id' ,'store_items.id as Item_id')
         ->orderBy('store_returned_used_items.created_at', 'desc')->get();

       // catogery for each product
         $all_stores_items=store_items::leftJoin('storecatgery_items','storecatgery_items.id','=','store_items.catogery_idi')
         ->leftJoin('storestatus_items','storestatus_items.id','=','store_items.status_idi')
         ->leftJoin('storestatus2_items','storestatus2_items.id','=','store_items.status2_idi')
         ->where('store_items.id','=',$reused_items->value('item_store_idu'))
         ->select('store_items.*','storecatgery_items.*','storestatus2_items.*','storestatus_items.*','store_items.id as storeitid')->get();

   //   $single_item=store_items::where('id',$id);
 $users=User::all();

    return view('store_items\reused_items',compact('reused_items','all_stores_items','users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(store_returned_used_items $store_returned_used_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(store_returned_used_items $store_returned_used_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, store_returned_used_items $store_returned_used_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(store_returned_used_items $store_returned_used_items)
    {
        //
    }

    public function return(Request $request ,$id)
    {

        $z= store_returned_used_items::find($id);

$item_id=$z->item_store_idu;

$z->add_to_user3 =$request->user2_loanu3;
$current_items=$z->used_curr_no;
//number needed bigger than stored
if($request->returned_numberu > $z->used_curr_no)
{

return redirect()->back()->with('messege',' number asked is less than exits ');

}

$z->used_curr_no=$current_items-$request->returned_numberu;
$z->sta_return=$request->status_returnedu;
$z->dateofreturned=$request->returned_dater;
 $z->noticeisu=$request->notices3;
$r=$z->save();

// option for choosind add item to anther user/////////////////////////////////


// calculate the remain item in stors is availble to request one of them
  $z1= store_returned_used_items::find($id);
if($z1->sta_return=='add_to_user3'){

if(!empty($z1->add_to_user3 )){



$l= new  Storeloan_items;

$l->item_store_id=$z1->item_store_idu ;
$l->userloan_id= $z1->add_to_user3 ;

    $l->number_itemsi=$request->returned_numberu ;

$l->loan_date=$z1->dateofreturned ;

$l->number_currentis=$request->returned_numberu ;
$l->item_owner=$z1->item_owneru;
$t1=$l->save();

}



if($t1){
$stored_number=$z1->number_returnu;



$cuurent_used=$z1->used_curr_no;


    $z3= store_returned_used_items::find($id);
   // $z3->number_returnu= ($stored_number - $cuurent_used );
   // $z->status_returned=$request->status_returned;
  //  $z3->user2_loan_id=$request->user2_loan;
    $z3->sta_return =$request->status_returned3;
    $t6=$z3->save();


if($t6){

return redirect()->back()->with('messege',' updated');
}
}

    }

if (!$t6)
   {

return redirect()->back()->with('messege','items returned add to another user ');

   }
    }


// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////// option for choosind add item to anther user/////////////////////////////////



     //   $z->user2_loan_id=$request->user2_loan;
      //  $z->status_to_user2=$request->status_returned2;




// in case of returned items is corrupted end////////////////////////



// in case of returned itesm is reusable start////////////////////







    }

