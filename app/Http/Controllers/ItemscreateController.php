<?php

namespace App\Http\Controllers;

use App\Models\library\keywords;
use App\Models\library\Itemscreate;
use App\Http\Controllers\Controller;
use App\Models\library\Itemchapters;
use Illuminate\Support\Facades\Auth;
use App\Models\library\ItemsCatogery;
use App\Models\library\socandCatogery;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreItemscreateRequest;
use App\Http\Requests\UpdateItemscreateRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ItemscreateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {




    // Count the number of records in the table
    $ItemsCatogery =ItemsCatogery::count();
    $keywords = keywords::count();
    $Cato2 = socandCatogery::count();
    // Return 1 if table is empty, otherwise return 0 or any other logic




if (($ItemsCatogery==0)){
    ItemsCatogery::create([
        "ar_title"=>strtolower('public'),
        "En_title"=>strtolower('public'),
        "description"=>'public',
        "created_by"=>'system',

    ]);
}
if ($keywords==0){
    keywords::create([
        "ar_title"=>strtolower('public'),
        "En_title"=>strtolower('public'),
        "description"=>'puplic',
        "created_by"=>'system',
    ]);
}
if ($Cato2==0){
    socandCatogery::create([
        "ar_title"=>strtolower('public'),
        "En_title"=>strtolower('public'),
        "description"=>'public',
        "created_by"=>'system',
    ]);
}

$ItemsCatogery =ItemsCatogery::all();
$keywords = keywords::all();
$Cato2 = socandCatogery::all();

$Itemscreated =Itemscreate::all();



        return view('libray_system.items_add',compact('ItemsCatogery','Cato2','keywords','Itemscreated'));
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
    public function store(StoreItemscreateRequest $request)
    {
        $request->validate([
            'title_ara'=>'Required','title_eng'=>'Required',
'copies_numbera'=>'numeric',
            'profil_impatha'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
            'pdfa'=>'mimes:pdf,doc,docx|max:2240',
                     // Each file must be PDF and less than 2MB
       ] );





        $foldername=$request->input('title_eng');   //file upload folder location name


        if ( $request->file('profil_impatha')){


         $imgname=$request->file('profil_impatha')->getClientOriginalName();

         $pathimg=  $request->file('profil_impatha')->storeAs($foldername,$imgname,'libraryfolder');


        }

        if ( $request->file('pdfa')){

            $pdfname=$request->file('pdfa')->getClientOriginalName();

            $pdfbath= $request->file('pdfa')->storeAs($foldername, $pdfname,'libraryfolder');


           }




     $r = new Itemscreate;

        if ( $request->file('profil_impatha')){


            $imgname=$request->file('profil_impatha')->getClientOriginalName();

            $pathimg=  $request->file('profil_impatha')->storeAs($foldername,$imgname,'libraryfolder');



    $r->profil_impath=$pathimg;
        }
        if ( $request->file('pdfa')){

            $pdfname=$request->file('pdfa')->getClientOriginalName();

            $pdfbath= $request->file('pdfa')->storeAs($foldername, $pdfname,'libraryfolder');




        $r-> files_path= $pdfbath;
        }
        $r-> title_ara=$request->title_ara;
        $r-> title_eng=$request->title_eng;
        $r-> auther1=$request->auther1a;
        $r->coauther2=$request->coauther2a;
        $r->coauther3=$request->coauther3a;
        $r->coauther4=$request->coauther4a;
        $r->coauther5=$request->coauther5a;
        $r->barcode_number=$request->barcode_numbera;
        $r->introduction=$request->introductiona;
        $r->summery=$request->summerya;
        $r->location=$request->locationa;
        $r->copies_number=$request->copies_numbera;



        $r->catogery_id=$request->catogery_ida;
        $r->catogery2_id=$request->catogery2_ida;
        if(!empty($request->keyword_ida)){
        $r->keyword_id=implode(',', $request->keyword_ida);// array
        }
        $r->locked=$request->lockeda;
        $r->visible=$request->visiblea;
       $f1 =$r->save();

if ($f1)
 {
    return redirect('/Itemscreate')->with('messege','updated successfully');
 }
 else {
     return redirect('/Itemscreate')->with('messege','not updated ,try again');
}

        //$id for  catogery of public  items add


}
   /**
        * Display the specified resource.

     */

    public function show($id)
    {
        $ItemsCatogery =ItemsCatogery::all();
        $keywords = keywords::all();
        $Cato2 = socandCatogery::all();
        $Catogery_title= ItemsCatogery::where('id','=', $id)->value('id');
        $Itemscreated=Itemscreate::all();
return view('libray_system.items_add',compact('Catogery_title','ItemsCatogery','Cato2','keywords','Itemscreated'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itemscreate $itemscreate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemscreateRequest $request, $id)
    {

       $request->validate([
        'title_ara'=>'Required',
        'title_eng'=>'required',
'copies_numbera'=>'numeric',
'profil_impatha'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
     'pdfa'=>'mimes:pdf,doc,docx|max:2240',
                 // Each file must be PDF and less than 2MB
   ] );


//////// return key word title for each item////////////

/*
$Itemskey[]=Itemscreate::where('id',$id)->get((explode(',','keyword_id')));

foreach( $Itemskey as $key)
{
   $key2= keywords::where('id',$key)->get();
echo $key2;


}

*/




///////////////////////////////

    $foldername=$request->input('title_eng');   //file upload folder location name







 $r =  Itemscreate::findOrFail($id);

    if (!empty( $request->file('item_img'))){
       $request->validate([

        'item_img'=>'mimes:png,jpeg,jpg,gif,jpg|max:1240', // 5MB max size
    ]);

        $imgname=$request->file('item_img')->getClientOriginalName();

        $pathimg=  $request->file('item_img')->storeAs($foldername,$imgname,'libraryfolder');
 //return $pathimg;

$r->profil_impath=$pathimg;
    }

   if (!empty( $request->file('item_file'))){
        $request->validate([

            'item_file'=>'mimes:pdf,doc,docx|max:2240',
     ]);

     $pdfname=$request->file('item_file')->getClientOriginalName();


     $pdfbath=  $request->file('item_file')->storeAs($foldername, $pdfname,'libraryfolder');
  //return $pathimg;

 $r->files_path=$pdfbath;
   }



    $r-> title_ara=$request->title_ara;
    $r-> title_eng=$request->title_eng;
    $r-> auther1=$request->auther1a;
    $r->coauther2=$request->coauther2a;
    $r->coauther3=$request->coauther3a;
    $r->coauther4=$request->coauther4a;
    $r->coauther5=$request->coauther5a;
    $r->barcode_number=$request->barcode_numbera;
    $r->introduction=$request->introductiona;
    $r->summery=$request->summerya;
    $r->location=$request->locationa;
    $r->copies_number=$request->copies_numbera;

    $r->locked=$request->lockeda;
    $r->visible=$request->visiblea;

    $r->catogery_id=$request->catogery_ida;
    $r->catogery2_id=$request->catogery2_ida;
    if(!empty($request->keyword_ida)){
if(!empty($request->keyword_ida)){
    $r->keyword_id=implode(',', $request->keyword_ida);// array
}
}
   $f1 =$r->save();

if ($f1)
{
return redirect('/Itemscreate')->with('messege','updated successfully');
}
else {
 return redirect('/Itemscreate')->with('messege','not updated ,try again');
}

    //$id for  catogery of public  items add

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        $imgPath =Itemscreate::where ('id',$id)->value('profil_impath');
if(!empty($imgPath )){
        if (Storage::disk('libraryfolder')->exists($imgPath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($imgPath);

        }
        }

        $filePath =Itemscreate::where ('id',$id)->value('files_path');
 if(!empty($filePath )){
        if (Storage::disk('libraryfolder')->exists($filePath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($filePath);

        }
}
// delete all cahpter related to item
$deleteditemchapter= Itemchapters::where('item_id', $id)->delete();
        $deleteditem= Itemscreate::where('id', $id)->delete();

        if ( $deleteditem) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }







    }

