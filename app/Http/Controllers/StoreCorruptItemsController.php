<?php

namespace App\Http\Controllers;

use App\Models\stor_items\store_corrupt_items;
use App\Models\stor_items\store_returned_used_items;
 use App\Models\stor_items\Storeloan_items;
use App\Models\User;
use App\Models\stor_items\store_items;
use Illuminate\Http\Request;

class StoreCorruptItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $all_stores_items=store_items::all();
        $all_stores_corrupted=store_corrupt_items::leftJoin('store_items','store_corrupt_items.item_store_idc','=','store_items.id')
       ->leftJoin('users','store_corrupt_items.item_ownerc','=','users.id')

        ->select('store_items.*','store_corrupt_items.*','store_corrupt_items.id as corr_id','users.*')->orderBy('store_corrupt_items.created_at', 'desc')
        ->get();


        $sum_price= $all_stores_corrupted->where('still_exits','=',1)->sum('corr_price');

        // return $sum_price;
        return view('store_items\all_item_corrupted' ,compact('users','all_stores_items','all_stores_corrupted','sum_price'));
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
    public function show(store_corrupt_items $store_corrupt_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(store_corrupt_items $store_corrupt_items)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request,$id)
    {

        $currnum=store_corrupt_items::where('id',$id)->value('curr_no_corrupted');
       $pricecorrupted_edit=store_corrupt_items::where('id',$id)->update([
'pricec_one'=>$request->price_corrupted,
'corr_price'=>$request->price_corrupted * $currnum,
'still_exits'=>$request->still_exits_c,

 ]);
  $all_stores_items=store_items::all();
        $all_stores_corrupted=store_corrupt_items::leftJoin('store_items','store_corrupt_items.item_store_idc','=','store_items.id')
       ->leftJoin('users','store_corrupt_items.item_ownerc','=','users.id')

        ->select('store_items.*','store_corrupt_items.*','store_corrupt_items.id as corr_id','users.*')
        ->get();


        $sum_price= $all_stores_corrupted->where('still_exits','=',1)->sum('corr_price');

 if($pricecorrupted_edit){

        // return $sum_price;
        return view('store_items\all_item_corrupted' ,compact('all_stores_items','all_stores_corrupted','sum_price'))->with('messege','updated');

    }
    if(!$pricecorrupted_edit){

        // return $sum_price;
        return view('store_items\all_item_corrupted' ,compact('all_stores_items','all_stores_corrupted','sum_price'))->with('messege',' not updated');

    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(store_corrupt_items $store_corrupt_items)
    {
        //
    }
public function returntocurropted(Request $request,$id)
    {

 $f= store_returned_used_items::find($id);


if( $f->used_curr_no < $request->returned_number){

    return redirect()->back()->with('messege','العدد اكبر من العدد الموجود بالفعل');

}
 $new_value=($f->used_curr_no - $request->returned_number);
$f->used_curr_no = $new_value;
$f->dateofreturned=$request->returned_date;
$y=$f->save();

if($y){
 $f= store_returned_used_items::find($id);
 $owner_item=$f->item_owneru;
$p=new store_corrupt_items;
$p->item_ownerc=$owner_item;
$p->item_store_idc=$request->st_reused_it;
$p->number_returnc=$request->returned_number;
$p->curr_no_corrupted=$request->returned_number;
$p->returned_datec=$request->returned_date;
$p->noticeisc=$request->notices;
$p->statusc=$request->status_returned;
$p->pricec_one=$request->corr_price;
$p->corr_price=$request->returned_number*$request->corr_price;

$p->still_exits=$request->still_exitc;

$g=$p->save();
if($g){
 return redirect()->back()->with('messege','saved succesfully');

    }
    if(!$g)
    {
       return redirect()->back()->with('messege','تم الخصم من الجدول المستعمل ولكن لم يتم الاضافه لجدول الكهنة');

    }

}
if(!$y)
    {
       return redirect()->back()->with('messege','not saved try again');

    }


}

public function returntoused(Request $request,$id)




{

$users=User::all();
 $f= store_corrupt_items::find($id);

$itemcrrid=$f->item_store_idc;
if( $f->curr_no_corrupted < $request->returned_numberc){

    return redirect()->back()->with('messege','العدد اكبر من العدد الموجود بالفعل');

}
 $new_value=($f->curr_no_corrupted  - $request->returned_numberc);
$f->curr_no_corrupted = $new_value;
$f->dateofreturned=$request->returned_date;
$f->corr_price=$new_value * $f->pricec_one;
$y=$f->save();

if($y){
 $f=store_corrupt_items::find($id);
 $owner_item=$f->item_ownerc ;
$p=new store_returned_used_items;
$p->item_owneru=$owner_item;
$p->item_store_idu=$itemcrrid;
$p->number_returnu=$request->returned_numberc;
$p->used_curr_no=$request->returned_numberc;
$p->returned_dateu=$request->returned_date;
$p->noticeisu=$request->notices;
$p->statusu=$request->status_returned;
$p->priceu_one=$request->corr_price;
$p->used_price=$request->corr_price * $request->returned_numberc;

$p->still_exits1=$request->still_exitc;

$g=$p->save();
if($g){
 return redirect()->back()->with('messege','saved succesfully');

    }
    if(!$g)
    {
       return redirect()->back()->with('messege','تم الخصم من الجدول الكهنه واضافه الى جدول المستعمل');

    }

}
if(!$y)
    {
       return redirect()->back()->with('messege','not saved try again');

    }


}


public function returntouserc(request $request,$id)
{
$request->validate([

'users_loanc'=>'Required',
'returned_numberc'=>'Required',




]);

        $z= store_corrupt_items::find($id);

$item_id=$z->item_store_idc;

$z->add_to_user3c =$request->users_loanc;
$current_items=$z->curr_no_corrupted;
//number needed bigger than stored
if($request->returned_numberc > $z->curr_no_corrupted)
{

return redirect()->back()->with('messege',' number asked is less than exits ');

}

$z->curr_no_corrupted=$current_items-$request->returned_numberc;
$z->statusc=$request->status_returnedu;
$z->dateofreturned =$request->returned_dater;
 $z->noticeisc=$request->notices3;

$r=$z->save();

// option for choosind add item to anther user/////////////////////////////////


// calculate the remain item in stors is availble to request one of them
  $z1=store_corrupt_items::find($id);


if(!empty($z1->add_to_user3c )){

$l= new  Storeloan_items;

$l->item_store_id=$z1->item_store_idc ;
$l->userloan_id= $z1->add_to_user3c ;

    $l->number_itemsi=$request->curr_no_corrupted ;

$l->loan_date=$z1->dateofreturned ;
$l->number_itemsi=$request->returned_numberc;
$l->number_currentis=$request->returned_numberc ;
$l->item_owner=$z1->item_ownerc ;

$users_namec=$request->users_namec;
if(!empty($users_namec)){
$l->parteners=implode(',',$users_namec);
}
$l->departmentis=$request->department;
$l->used_price_item=$request->corr_price;
$l->total_prc=$request->returned_numberc * $request->corr_price;
$l->edit_disabled=1;
$t1=$l->save();


if($t1){
/*$stored_number=$z1->number_returnu;

$cuurent_used=$z1->used_curr_no;


    $z3= store_returned_used_items::find($id);
   // $z3->number_returnu= ($stored_number - $cuurent_used );
   // $z->status_returned=$request->status_returned;
  //  $z3->user2_loan_id=$request->user2_loan;
    $z3->sta_return =$request->status_returned3;
    $t6=$z3->save();


if($t6){
*/
return redirect()->back()->with('messege',' updated');
}


if (!$t1)
   {

return redirect()->back()->with('messege','items returned add to another user ');

   }


}
}



}
