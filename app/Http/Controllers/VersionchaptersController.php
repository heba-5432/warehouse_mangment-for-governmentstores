<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\library\ItemVersions;
use App\Models\library\Versionchapters;
use Illuminate\Support\Facades\Storage;

class VersionchaptersController extends Controller
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
            'chapter_nocv'=>'numeric',
            'chapter_tiltecv'=>'required',

                   ]);
         //   $id=$request->ver_id;


            $b_exit=$request['chapter_tiltecv'];
            if (Versionchapters::where('chapter_titlecv','=', $b_exit)->first()) {
                return redirect()->route('ver_chapter.add',$request->ver_id)->with("messege","this item added before");
            }

            $b_exit=$request['chapter_nocv'];
            if (Versionchapters::where('chapternocv','=', $b_exit)->first()) {
                return redirect()->route('ver_chapter.add',$request->ver_id)->with("messege","chapter number added before");
            }



            else{
$id=$request->ver_id;
                $vertitle=ItemVersions::findOrFail( $id)->value('title_engv');
                $folder_name= $vertitle;

                  $y= new Versionchapters;
            $y->chapternocv=$request->chapter_nocv;
            $y-> chapter_titlecv=strtolower($request->chapter_tiltecv);
            $y->  chapter_part1cv=$request->part1cv;
            $y->  chapter_part2cv=$request->part2cv;
            $y->  chapter_part3cv=$request->part3cv;
            $y-> chapter_part4cv=$request->part4cv;

            $y-> ver_id=$request->ver_id;

               if (!empty( $request->file('coverimgcv'))){

                $request->validate([


                    'coverimgcv'=>'mimes:png,jpeg,gif,jpg,jpg|max:1200',
                ]);

                $imgname=$request->file('coverimgcv')->getClientOriginalName();

                $imgbath= $request->file('coverimgcv')->storeAs($folder_name, $imgname,'libraryfolder');

                $y->cover_imgpathcv=$imgbath;

               }


              $y->file_namecv=$request->file_name1;


               if (!empty( $request->file('pdfacv'))){

                $request->validate([


                    'pdfacv'=>'mimes:pdf,doc,docx|max:2240',
                ]);

                $pdfname=$request->file('pdfacv')->getClientOriginalName();

                $pdfbath= $request->file('pdfacv')->storeAs($folder_name, $pdfname,'libraryfolder');

                $y->file_pathcv=$pdfbath;

            }



            $y->visiblitycv=$request->visibleacv; //shown
            $y-> lockcv=$request->lockedacv;
               $y->created_by=auth()->user()->id;

             $chapter_created=$y->save();

             if ( $chapter_created)
             {
                return redirect()->route('ver_chapter.add',$request->ver_id)->with('messege','updated successfully');
             }
             else {
                return redirect()->route('ver_chapter.add',$request->ver_id)->with('messege','not updated ,try again');
            }

            }



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        {

            $version=ItemVersions::findOrFail( $id);

           $all_chapters= Versionchapters::where('ver_id',$id)->get();
    return view('libray_system.version_chapters',compact('version','all_chapters'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Versionchapters $versionchapters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $g=Versionchapters::findOrFail($id)->value('ver_id');

        $Itemstitle1=ItemVersions::findOrFail($g)->value('title_engv');
       // return $Itemstitle1;
        $folder_name= $Itemstitle1;



        $y=Versionchapters::findOrFail($id);

///////////////imgfile upload/////////////////


        if (!empty( $request->file('coverimg1cv'))){
            $request->validate([


            'coverimg1cv'=>'mimes:png,jpeg,jpg,gif,jpg|max:2240', // 5MB max size
        ]);

            $imgname=$request->file('coverimg1cv')->getClientOriginalName();

            $pathimg=  $request->file('coverimg1cv')->storeAs($folder_name,$imgname,'libraryfolder');

            // return $pathimg;

    $y->cover_imgpathcv=$pathimg;
        }

///////////////img upload/////////////////

///////////////file upload/////////////////
        if (!empty( $request->file('pdfa1cv'))){

            $request->validate([


                'pdfa1cv'=>'mimes:pdf,doc,docx|max:2240',
            ]);

            $pdfname=$request->file('pdfa1cv')->getClientOriginalName();

            $pdfbath= $request->file('pdfa1cv')->storeAs($folder_name, $pdfname,'libraryfolder');




        $y->file_pathcv= $pdfbath;
        }




///////////////file upload/////////////////

if (!empty( $request->file('chapter_no'))){
        $y->chapternocv=$request->chapter_no;
}
        $y-> chapter_titlecv=$request->chapter_tilte;
        $y->  chapter_part1cv=$request->part1;
        $y->  chapter_part2cv=$request->part2;
        $y->  chapter_part3cv=$request->part3;
        $y-> chapter_part4cv=$request->part4;

      //  $y-> item_id=$request->Item_id;





        $y->file_namecv=$request->file_name1;

        $y->visiblitycv=$request->visiblea; //shown
        $y-> lockcv=$request->lockeda;
           $y->created_by=auth()->user()->id;

         $chapter_created=$y->save();

         if ( $chapter_created)
         {
            return redirect()->route('ver_chapter.add',$y->ver_id)->with('messege','updated successfully');
         }
         else {
            return redirect()->route('verchapter.add',$y->ver_id)->with('messege','not updated ,try again');
        }

        }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $imgPath =Versionchapters::where ('id',$id)->value('cover_imgpathcv');
if(!empty($imgPath )){
        if (Storage::disk('libraryfolder')->exists($imgPath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($imgPath);

        }
        }

        $filePath =Versionchapters::where ('id',$id)->value('file_pathcv');
 if(!empty($filePath )){
        if (Storage::disk('libraryfolder')->exists($filePath)) {
            // Delete the file
            Storage::disk('libraryfolder')->delete($filePath);

        }

}



        $deleteditem= Versionchapters::where('id', $id)->delete();

        if ( $deleteditem) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }
    }

