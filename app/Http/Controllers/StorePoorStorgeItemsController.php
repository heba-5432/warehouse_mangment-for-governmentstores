<?php

namespace App\Http\Controllers;

use App\Models\stor_items\store_poor_storge_items;
use Illuminate\Http\Request;
use App\Models\stor_items\store_items;
use Symfony\Contracts\Service\Attribute\Required;

class StorePoorStorgeItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $all_stores_items=store_items::all();
        $all_stores_poor=store_poor_storge_items::leftJoin('store_items','store_poor_storge_items.item_store_idp','=','store_items.id')
         ->select('store_items.*','store_poor_storge_items.*','store_poor_storge_items.id as poor_id')
        ->get();


        return view('store_items\all_item_poor_storage' ,compact('all_stores_items','all_stores_poor'));
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
    'returned_number'=>'Required',
    'returned_date'=>'Required',
    'store_poor_items'=>'Required',

  ]);
  $single_item1= store_items::where('store_items.id','=',$request->store_poor_items)->value('current_qauntaty');
$price_item=store_items::where('store_items.id','=',$request->store_poor_items)->value('new_price');


$u= new store_poor_storge_items;




$u->item_store_idp = $request->store_poor_items;

if ($request->returned_number> $single_item1){

    return back()->with ('messege','العدد '.  $request->returned_number.' غير متوافر حاليا بالمخزن' .'العدد الحالى'.$single_item1);
}



$u->number_returnp = $request->returned_number;
$u->returned_datep = $request->returned_date;
$u->noticeisp = $request->notices;
//$u->created_by= auth()->user()->id;
$t=$u->save();
if($t )
{
    $current_items=store_items::where('id','=',$request->store_poor_items)->value('current_qauntaty');
    $current_items_new=($current_items - $request->returned_number);
   $g= store_items::where('id','=',$request->store_poor_items)->update([
       'current_qauntaty'=>$current_items_new,
        'current_total_pricen'=>$current_items_new * $price_item,
   ]);


   if($g)
    return redirect()->back()->with('messege','saved succesfully');

if( !$g ) {

    return redirect()->back()->with('messege','تم الحفظ لكن لم يتم النقص من المخزن');

}
}
if(!$t){
    return redirect()->back()->with('messege','error not saved');

    }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {


        $all_stores_items=store_items::all();
        $all_stores_poor=store_poor_storge_items::leftJoin('store_items','store_poor_storge_items.item_store_idp','=','store_items.id')
         ->select('store_items.*','store_poor_storge_items.*','store_poor_storge_items.id as poor_id')
        ->get();


        $single_item=store_items::where('id',$id)->get();


        return view('store_items\item_poor_storage' ,compact('all_stores_items','single_item','all_stores_poor'));

        }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(store_poor_storge_items $store_poor_storge_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
// id is the id of poor storage table items

        $single_item= store_poor_storge_items::where('item_store_idp','=',$request->store_poor_items)->value('number_returnp');// current number in poor storage
        $current_items=store_items::where('store_items.id','=',$request->store_poor_items)->value('current_qauntaty');// current number in all starage
$price_item=store_items::where('store_items.id','=',$request->store_poor_items)->value('new_price');


        $z= store_poor_storge_items::find($id);

//الفكره كلها ان العدد الحالى الموجود بالمخزن هو ما تبقى من ما تم حفظه من قبل وبالتالى
 //لو تم تعديل الرقم مره اخري لابد من رده من خصمه لكى يتم الخصم على العدد الصحيح للمخزن

        //$z->item_store_id=$request->store_poor_items;
       // $z->userloan_id=$request->users_loan;

//حساب العدد الموجود بالمخزن وخصم العدد المطلوب تكهينه
        if (( $current_items - $request->returned_number) < 0){
            return back()->with ('messege','العدد '.  $request->returned_number.' غير متوافر حاليا بالمخزن' .'العدد الحالى'.$current_items);
        }

        $stored_number=$z->number_returnp; //العدد المكهن حاليا
        $requested_number=$request->returned_number;

        if($requested_number > $stored_number){
            $newvalue=($requested_number-$stored_number);
            $current_items_new=($current_items - $newvalue);
            $g= store_items::where('store_items.id','=',$request->store_poor_items)->update([
                'current_qauntaty'=>$current_items_new,
                 'current_total_pricen'=>$current_items_new * $price_item,
            ]);
        }


        if($requested_number < $stored_number){
            $newvalue=($stored_number-$requested_number);
            $current_items_new=($current_items + $newvalue);
            $g= store_items::where('store_items.id','=',$request->store_poor_items)->update([
                'current_qauntaty'=>$current_items_new,
                 'current_total_pricen'=>$current_items_new * $price_item,
            ]);
        }
        ///نهايه الخصم واستعاده العناصر من المخزن
            $z->number_returnp=$request->returned_number;

        $z->noticeisp=$request->notices;
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
$j=store_poor_storge_items::where('id',$id)->get()->first();
$items_number=$j->value('number_returnp');
$store_item_id=$j->value('item_store_idp');
        // add item deleted

$price_item=store_items::where('store_items.id','=',$store_item_id)->value('new_price');


        $current_items=store_items::where('store_items.id','=',$store_item_id)->value('current_qauntaty');
 $current_items_new=($current_items + $items_number);
$g= store_items::where('store_items.id','=',$store_item_id)->update([
    'current_qauntaty'=>$current_items_new,
     'current_total_pricen'=>$current_items_new * $price_item,
]);

If($g){
    $i=store_poor_storge_items::where('id',$id)->delete();
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

