<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library\keywords;
use App\Models\library\Itemscreate;
use App\Http\Controllers\Controller;
use App\Models\library\ItemVersions;
use App\Models\library\ItemsCatogery;
use App\Models\library\socandCatogery;
use App\Models\library\Versionchapters;
use Illuminate\Support\Facades\Storage;

class ItemVersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ItemsCatogery =ItemsCatogery::all();
$keywords = keywords::all();
$Cato2 = socandCatogery::all();

$Itemscreated =Itemscreate::all();


$all_versions = ItemVersions::leftJoin("itemscreates","item_versions.main_item_v1","=","itemscreates.id")

->select('itemscreates.*','item_versions.*','item_versions.id as ver_id')->get();

// $all_versions;
// write join to select all version with related main items

/*$versionkey[]=ItemVersions::where('id',$id)->get((explode(',','keyword_id')));

foreach( $Itemskey as $key)
{
   $key2= keywords::where('id',$key)->get();
echo $key2;


}*/


return view('libray_system.add_version',compact('ItemsCatogery','Cato2','keywords','Itemscreated','all_versions'));
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

            'title_arv' => 'required|string|max:255',
            'title_engv'=>'required',
'copies_numberav'=>'numeric'|'max:6',
'item_idv'=>'required',
            'profil_impathav'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
            'pdfav'=>'mimes:pdf,doc,docx|max:2240',
                     // Each file must be PDF and less than 2MB
       ] );




        $foldername=$request->input('title_engv');   //file upload folder location name


     $r = new ItemVersions;

        if ( $request->file('profil_impathav')){


            $imgname=$request->file('profil_impathav')->getClientOriginalName();

            $pathimg=  $request->file('profil_impathav')->storeAs($foldername,$imgname,'libraryfolder');



    $r->ver_impathv=$pathimg;
        }
        if ( $request->file('pdfav')){

            $pdfname=$request->file('pdfav')->getClientOriginalName();

            $pdfbath= $request->file('pdfav')->storeAs($foldername, $pdfname,'libraryfolder');
            $r->verfile_pathv= $pdfbath;

        }
$b_exits=$request['title_arav'];
if(ItemVersions::where('title_arav','=', $b_exits)->first())
{
    return redirect('/item_version')->with('messege','item titled created before');

}

        $r->title_arav=$request->title_arav;


       $r->title_engv=$request->title_engv;
       $r-> main_item_v1=$request->item_idv;
       $r-> auther1v=$request->auther1av;
       $r-> coauther2v=$request->coauther2av;
       $r-> coauther3v=$request->coauther3av;
       $r-> coauther4v=$request->coauther4av;
       $r-> coauther5v=$request->coauther5av;

       $r-> barcode_numberv=$request->barcode_numberav;

       $r-> introductionv=$request->introductionav;
       $r->summeryv=$request->summeryav;
       $r-> locationv=$request->locationav;
       $r-> copies_numberv=$request->copies_numberav;
       $r-> catogery_idv=$request->catogery_idav;

       $r-> catogery2_idv=$request->catogery2_idav;
       if(!empty($request->keyword_idav)){
       $r-> keyword_idv=implode(',', $request->keyword_idav);// array keywords
       }
       $r-> visiblev=$request->visibleav;
       $r->lockedv=$request->lockedav;
       $r-> created_by=auth()->user()->id;

     $f2 =$r->save();

if ($f2)
 {
    return redirect()->route('itemversion.add',$request->item_idv)->with('messege','saved successfully');
 }
 else {
     return redirect('/item_version')->with('messege','not saved,try again');
}

        //$id for  catogery of public  items add


}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//$id is for item created frist item

        $ItemsCatogery =ItemsCatogery::all();
        $keywords = keywords::all();
        $Cato2 = socandCatogery::all();

        $Itemscreated =Itemscreate::where('id','=',$id)->get();

        $Itemscreated2 =Itemscreate::where('id','=',$id)->get('id');

$all_versions = ItemVersions::where('main_item_v1',$id)->get();

        return view('libray_system.add_version',compact('ItemsCatogery','Cato2','keywords','Itemscreated','all_versions'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemVersions $itemVersions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $foldername=$request->input('title_engv');   //file upload folder location name






        $r = ItemVersions::findOrFail($id);

        if ( !empty( $request->file('cover_av'))){

            $request->validate([


                'cover_av'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size

                         // Each file must be PDF and less than 2MB
           ] );
            $imgname=$request->file('cover_av')->getClientOriginalName();

            $pathimg=  $request->file('cover_av')->storeAs($foldername,$imgname,'libraryfolder');



    $r->ver_impathv=$pathimg;
        }



        if (!empty( $request->file('pfileav'))){
            $request->validate([

     'pfileav'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
                'pdfav'=>'mimes:pdf,doc,docx|max:2240',
                         // Each file must be PDF and less than 2MB
           ] );

            $pdfname=$request->file('pfileav')->getClientOriginalName();

            $pdfbath= $request->file('pfileav')->storeAs($foldername, $pdfname,'libraryfolder');
            $r->verfile_pathv= $pdfbath;

        }

        $r->title_arav=$request->title_arav;
       $r->title_engv=$request->title_engv;
       $r-> main_item_v1=$request->item_idv;
       $r-> auther1v=$request->auther1av;
       $r-> coauther2v=$request->coauther2av;
       $r-> coauther3v=$request->coauther3av;
       $r-> coauther4v=$request->coauther4av;
       $r-> coauther5v=$request->coauther5av;

       $r-> barcode_numberv=$request->barcode_numberav;

       $r-> introductionv=$request->introductionav;
       $r->summeryv=$request->summeryav;
       $r-> locationv=$request->locationav;
       $r-> copies_numberv=$request->copies_numberav;
       $r-> catogery_idv=$request->catogery_idav;

       $r-> catogery2_idv=$request->catogery2_idav;
if(!empty($request->keyword_idav)){
       $r-> keyword_idv=implode(',', $request->keyword_idav);// array keywords
}
       $r-> visiblev=$request->visibleav;
       $r->lockedv=$request->lockedav;
       $r-> created_by=auth()->user()->id;

     $f2 =$r->save();

if ($f2)
 {
    return redirect('/item_version')->with('messege','saved successfully');
 }
 else {
     return redirect('/Iitem_version')->with('messege','not saved,try again');
}

        //$id for  catogery of public  items add


}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

        $imgPath =ItemVersions::where ('id',$id)->value('ver_impathv');
if(!empty($imgPath )){
        if (Storage::disk('libraryfolder')->exists($imgPath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($imgPath);

        }
        }

        $filePath =ItemVersions::where ('id',$id)->value('verfile_pathv');
 if(!empty($filePath )){
        if (Storage::disk('libraryfolder')->exists($filePath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($filePath);

        }
}

// delete all cahpter related to item
$deleteditemchapter= Versionchapters::where('ver_id', $id)->delete();

        $deleteditem= ItemVersions::where('id', $id)->delete();

        if ( $deleteditem) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }
}
