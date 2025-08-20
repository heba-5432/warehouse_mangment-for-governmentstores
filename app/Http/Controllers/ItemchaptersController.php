<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library\Itemscreate;
use App\Http\Controllers\Controller;
use App\Models\library\Itemchapters;
use Illuminate\Support\Facades\Storage;

class ItemchaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
'chapter_no'=>'numeric',
'chapter_tilte'=>'required',

       ]);
$id=$request->Item_id;


$b_exit=$request['chapter_tilte'];
if (Itemchapters::where('chapter_title','=', $b_exit)->first()) {
    return redirect()->route('chapter.add',$request->Item_id)->with("messege","this item added before");
}

$b_exit=$request['chapter_no'];
if (Itemchapters::where('chapterno','=', $b_exit)->first()) {
    return redirect()->route('chapter.add',$request->Item_id)->with("messege","this item added before");
}



else{
    $id=$request->Item_id;
    $Itemstitle=Itemscreate::findOrFail( $id)->value('title_eng');
    $folder_name= $Itemstitle;

      $y= new Itemchapters;
$y->chapterno=$request->chapter_no;
$y-> chapter_title=strtolower($request->chapter_tilte);
$y->  chapter_part1=$request->part1;
$y->  chapter_part2=$request->part2;
$y->  chapter_part3=$request->part3;
$y-> chapter_part4=$request->part4;

$y-> item_id=$request->Item_id;

   if (!empty( $request->file('coverimg'))){

    $request->validate([


        'coverimg'=>'mimes:png,jpeg,gif,jpg,jpg|max:1200',
    ]);

    $imgname=$request->file('coverimg')->getClientOriginalName();

    $imgbath= $request->file('coverimg')->storeAs($folder_name, $imgname,'libraryfolder');

    $y->cover_imgpath=$imgbath;

   }


  $y->file_name=$request->file_name1;


   if (!empty( $request->file('pdfa'))){

    $request->validate([


        'pdfa'=>'mimes:pdf,doc,docx|max:2240',
    ]);

    $pdfname=$request->file('pdfa')->getClientOriginalName();

    $pdfbath= $request->file('pdfa')->storeAs($folder_name, $pdfname,'libraryfolder');

    $y->file_path=$pdfbath;

}



$y->visiblitych=$request->visiblea; //shown
$y-> lockch=$request->lockeda;
   $y->created_by=auth()->user()->id;

 $chapter_created=$y->save();

 if ( $chapter_created)
 {
    return redirect()->route('chapter.add',$request->Item_id)->with('messege','updated successfully');
 }
 else {
    return redirect()->route('chapter.add',$request->Item_id)->with('messege','not updated ,try again');
}

}



    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $Itemscreated=Itemscreate::findOrFail( $id);

       $all_chapters= Itemchapters::all();
return view('libray_system.create_chapters',compact('Itemscreated','all_chapters'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itemchapters $itemchapters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //id is for chapter not item  so youneed item id to return to same page


        $g=Itemchapters::findOrFail($id)->value('item_id');

        $Itemstitle1=Itemscreate::findOrFail($g)->value('title_eng');
       // return $Itemstitle1;
        $folder_name= $Itemstitle1;



        $y=Itemchapters::findOrFail($id);

///////////////imgfile upload/////////////////


        if (!empty( $request->file('coverimg1'))){
            $request->validate([


            'coverimg1'=>'mimes:png,jpeg,jpg,gif,jpg|max:2240', // 5MB max size
        ]);

            $imgname=$request->file('coverimg1')->getClientOriginalName();

            $pathimg=  $request->file('coverimg1')->storeAs($folder_name,$imgname,'libraryfolder');

            // return $pathimg;

    $y->cover_imgpath=$pathimg;
        }

///////////////img upload/////////////////

///////////////file upload/////////////////
        if (!empty( $request->file('pdfa1'))){

            $request->validate([


                'pdfa1'=>'mimes:pdf,doc,docx|max:2240',
            ]);

            $pdfname=$request->file('pdfa1')->getClientOriginalName();

            $pdfbath= $request->file('pdfa1')->storeAs($folder_name, $pdfname,'libraryfolder');




        $y->file_path= $pdfbath;
        }




///////////////file upload/////////////////
if (!empty( $request->file('chapter_no'))){

        $y->chapterno=$request->chapter_no;
}
        $y-> chapter_title=strtolower($request->chapter_tilte);
        $y->  chapter_part1=$request->part1;
        $y->  chapter_part2=$request->part2;
        $y->  chapter_part3=$request->part3;
        $y-> chapter_part4=$request->part4;

      //  $y-> item_id=$request->Item_id;





        $y->file_name=$request->file_name1;

        $y->visiblitych=$request->visiblea; //shown
        $y-> lockch=$request->lockeda;
           $y->created_by=auth()->user()->id;

         $chapter_created=$y->save();

         if ( $chapter_created)
         {
            return redirect()->route('chapter.add',$y->item_id)->with('messege','updated successfully');
         }
         else {
            return redirect()->route('chapter.add',$y->item_id)->with('messege','not updated ,try again');
        }

        }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $imgPath =Itemchapters::where ('id',$id)->value('cover_imgpath');
if(!empty($imgPath )){
        if (Storage::disk('libraryfolder')->exists($imgPath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($imgPath);

        }
        }

        $filePath =Itemscreate::where ('id',$id)->value('file_path');
 if(!empty($filePath )){
        if (Storage::disk('libraryfolder')->exists($filePath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($filePath);

        }
}
        $deleteditem= Itemscreate::where('id', $id)->delete();

        if ( $deleteditem) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }
    }

