<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library\keywords;
use Illuminate\Support\Facades\DB;
use App\Models\library\Itemscreate;
use App\Models\library\ItemVersions;
use App\Models\library\ItemsCatogery;
use App\Models\library\socandCatogery;
use App\Models\library\Ecommerce_items;

class EcommerceItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $book_info= Itemscreate::all();

        //return  $book_info;
        $Catogery = ItemsCatogery::all();
        $keies = keywords::all();
        $Catogery2 = socandCatogery::all();
$item_all_show= ItemVersions::all();

  return   view('libray_system.Eproducts.products',compact('book_info','item_all_show','Catogery','keies','Catogery2'));




    }
/*$book_info= Itemscreate::all();
foreach($book_info->value('id') as  $r1){
$r= $book_info->value('id');
//return $r;
if (is_array($r) || is_object($r)) {



$version_info=ItemVersions::leftJoin('itemscreates','item_versions.main_item_v1','=','itemscreates.id')

->where('item_versions.main_item_v1','=',$r1)

->select('item_versions.*','itemscreates.*','item_versions.id as ver_id','itemscreates.id as book_id')->get();
return $version_info;

}*-/




    //  return view('libray_system.Eproducts.products',compact('version_info','book_info'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

public function filter(Request $request)
{

    $Catogery = ItemsCatogery::all();
    $keies = keywords::all();
    $Catogery2 = socandCatogery::all();
$filter_items=[
'filter_match'=> $request->input('excat_match'),
 'cat1'=>   $request->input('filtercat1'),
 'cat2'=>  $request->input('filtercat2'),
'keywords'=>$request->input('keywords'),
'authors'=>$request->input('Authers'),
'summery'=>$request->input('summery'),
'barcode'=>$request->input('barcode_number'),

];
 if ($filter_items['filter_match']!="on"){

$book_info =  Itemscreate::where('catogery_id',  '=', $filter_items['cat1'] )
->orWhere('catogery2_id',  '=', $filter_items['cat2'] )
 ->orWhere('keyword_id', 'like', '%' .  $filter_items['keywords']. '%')
 ->orWhere('auther1', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther2', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther3', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther4', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther5', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('summery', 'like', '%' .  $filter_items['summery']. '%')
 ->orWhere('introduction', 'like', '%' .  $filter_items['summery']. '%')
 ->orWhere('barcode_number',  '=', $filter_items['barcode'] )
 ->get();

$item_all_show =ItemVersions::where('catogery_idv',  '=', $filter_items['cat1'] )
->orWhere('catogery2_idv',  '=', $filter_items['cat2'] )
 ->orWhere('keyword_idv', 'like', '%' .  $filter_items['keywords']. '%')
 ->orWhere('auther1v', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther2v', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther3v', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther4v', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('coauther5v', 'like', '%' .  $filter_items['authors']. '%')
 ->orWhere('summeryv', 'like', '%' .  $filter_items['summery']. '%')
 ->orWhere('introductionv', 'like', '%' .  $filter_items['summery']. '%')
 ->orWhere('barcode_numberv',  '=', $filter_items['barcode'] )
 ->get();

 }
 if ($filter_items['filter_match']=="on"){

    $book_info =  Itemscreate::where('catogery_id',  '=', $filter_items['cat1'] )
    ->Where('catogery2_id',  '=', $filter_items['cat2'] )
     ->Where('keyword_id', 'like', '%' .  $filter_items['keywords']. '%')
     ->Where('auther1', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther2', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther3', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther4', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther5', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('summery', 'like', '%' .  $filter_items['summery']. '%')
     ->Where('introduction', 'like', '%' .  $filter_items['summery']. '%')
     ->Where('barcode_number',  '=', $filter_items['barcode'] )
     ->get();

    $item_all_show =ItemVersions::where('catogery_idv',  '=', $filter_items['cat1'] )
    ->Where('catogery2_idv',  '=', $filter_items['cat2'] )
     ->Where('keyword_idv', 'like', '%' .  $filter_items['keywords']. '%')
     ->Where('auther1v', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther2v', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther3v', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther4v', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('coauther5v', 'like', '%' .  $filter_items['authors']. '%')
     ->Where('summeryv', 'like', '%' .  $filter_items['summery']. '%')
     ->Where('introductionv', 'like', '%' .  $filter_items['summery']. '%')
     ->Where('barcode_numberv',  '=', $filter_items['barcode'] )
     ->get();

     }


   // Combine results into an array
   $results = [
    'book_info' => $book_info,
    'item_all_show' => $item_all_show,

];
//return $results['item_all_show']; to only return one of the item in the aary
// Return the view with results
return view('libray_system.Eproducts.products', compact('results','item_all_show' ,'Catogery','keies','Catogery2'));
}










    public function search(Request $request)
    {

     //   $query = $request->input('query');

      //  $book_info= Itemscreate::where('title_ara', 'LIKE', "%$query%");

        //return  $book_info;



//$item_all_show= ItemVersions::where('title_ara', 'LIKE', "%$query%");

//$query = $request->input('query');

////////////////////////////////////////////////////////

$Catogery = ItemsCatogery::all();
$keies = keywords::all();
$Catogery2 = socandCatogery::all();

        // Get the search input
        $searchTerm = $request->input('query');

        // Search users table
        $book_info =  Itemscreate::where('title_ara', 'like', '%' . $searchTerm . '%')
            ->get();

        // Search products table
        $item_all_show =ItemVersions::where('title_arav', 'like', '%' . $searchTerm . '%')
           // ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->get();



        // Combine results into an array
        $results = [
            'book_info' => $book_info,
            'item_all_show' => $item_all_show,

        ];
//return $results['item_all_show']; to only return one of the item in the aary
        // Return the view with results
        return view('libray_system.Eproducts.products', compact('results','item_all_show' ,'searchTerm','Catogery','keies','Catogery2'));
    }








////////////////////////////////////////////////
/*
//return  $book_info;


$book_info = Itemscreate::where('title_ara', 'LIKE', "%$query%")->get();
$item_all_show= ItemVersions::where('title_arav', 'LIKE', "%$query%")->get();

//$book_info= Itemscreate::where('title_ara', 'LIKE', "%$query%")->get();
// $book_info = Itemscreate::where('title_ara', 'LIKE', "%$query%")->get();

//    return [$book_info,$item_all_show];
// Return the view with the results
return view('libray_system.Eproducts.products', compact('item_all_show','book_info', 'query'));


       // $book_info = Itemscreate::where('title_ara', 'LIKE', "%$query%")->get();
        $book_info = DB::table('itemscreates')
        ->leftjoin('item_versions', 'itemscreates.id', '=', 'item_versions.main_item_v1')
        ->where('itemscreates.title_ara', 'LIKE', "%$query%")
        ->orWhere('item_versions.title_arav', 'LIKE', "%$query%")
        ->select('itemscreates.*','item_versions.*', 'item_versions.title_arav as version_name')
        ->get();
        $item_all_show= ItemVersions::->leftjoin('item_versions', 'itemscreates.id', '=', 'item_versions.main_item_v1')
        ->where('itemscreates.title_ara', 'LIKE', "%$query%")
        ->orWhere('item_versions.title_arav', 'LIKE', "%$query%")
        ->select('itemscreates.*','item_versions.*', 'item_versions.title_arav as version_name')
        ->get();
       // $item_all_show= ItemVersions::all();(
       // return $book_info
    // Return the view with the results
   return view('libray_system.Eproducts.products', compact('item_all_show','book_info', 'query'));
*/




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
    public function show(Ecommerce_items $ecommerce_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ecommerce_items $ecommerce_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ecommerce_items $ecommerce_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ecommerce_items $ecommerce_items)
    {
        //
    }
}
