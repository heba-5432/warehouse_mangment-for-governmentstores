<?php

namespace App\Http\Controllers;
use Illuminate\Http\storeAS;
use App\Models\Usersmoredetails;
use App\Http\Requests\StoreUsersmoredetailsRequest;
use App\Http\Requests\UpdateUsersmoredetailsRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UsersmoredetailsController extends Controller
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
    public function store(StoreUsersmoredetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

       if($id== null )
       {
$id=auth()->user()->id;

       }else{
        $f= Usersmoredetails::where('user_idf','=',$id)->value('id');
       if ($f)
       {
        $users_info = Usersmoredetails::Leftjoin("users","Usersmoredetails.user_idf","=","users.id")
        ->where('Usersmoredetails.user_idf', '=', $id)
        ->select('Usersmoredetails.id as details_id','users.*','users.id as user_id','Usersmoredetails.*');
        return
        view('roll_payments.users_info.users_detailed_information',compact( 'users_info'))->with('users_info',$users_info) ;
       }
       else {

       $item= new Usersmoredetails;
       $item->user_idf=$id;
       $item->save();
       $users_info = Usersmoredetails::Leftjoin("users","Usersmoredetails.user_idf","=","users.id")
       ->where('Usersmoredetails.user_idf', '=', $id)
       ->select('Usersmoredetails.id as details_id','users.*','users.id as user_id','Usersmoredetails.*');



       return view('roll_payments.users_info.users_detailed_information',compact( 'users_info'))
       ->with('sharedData',  $users_info);
       }

        /*$users_aw = Usersmoredetails::Leftjoin("users","Usersmoredetails.user_idf","=","users.id")
        ->where('Usersmoredetails.id', '=', $id)
        ->get();*/
    }
    /**
     * Show the form for editing the specified resource.
     */
}
    public function edit(Usersmoredetails $usersmoredetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersmoredetailsRequest $request, $id)
    {
// id is id of table user details,
//$request->id is id of users table
    $request->validate([
        'profileimg'=>'mimes:png,jpeg,gif,jpg|max:2240', // 5MB max size
        'cvpdf'=>'mimes:pdf,doc,docx|max:2240',
                 // Each file must be PDF and less than 2MB
   ] );
$foldername=$request->input('name');   //file upload folder location name


if ( $request->file('profileimg')){
 $profileimg=$request->file('profileimg')->getClientOriginalName();

 $pathimg=  $request->file('profileimg')->storeAs($foldername,$profileimg,'imgfolder');

 $r =   Usersmoredetails:: where('id',$id)->update([


    'profil_impath'=> $pathimg,
    'descrption'=>$request->more_details,

    ]);


};
if ( $request->file('cvpdf')){
 $pathcvpdf=$request->file('cvpdf')->getClientOriginalName();

 $pathcv=  $request->file('cvpdf')->storeAs($foldername,$pathcvpdf ,'imgfolder');


 $r =   Usersmoredetails:: where('id',$id)->update([
'files_name'=>$pathcvpdf,
    'files_path'=> $pathcv,
    'descrption'=>$request->more_details,

    ]);
};
if ( $request->input('more_details')){



    $r =   Usersmoredetails:: where('id',$id)->update([

       'descrption'=>$request->more_details,

       ]);
   };
   // to return with users information
   $user_details= Usersmoredetails:: where('id',$id)->value('user_idf');

// Initialize an array to store file paths


//store file with its orignal name in foleder created "images" with path disc imgfolder 3 parmater frist file uploade name
// ,file upload folder location name ,disc path in puplic folder


      // $pathmorefile=  $request->file('morefilesname')->storeAs( $path, $foldername ,'imgfolder');
       //return  $pathimg;
//retrn to page with id


return redirect()->route('users_details.show',$user_details)->with('messege','uploade  successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usersmoredetails $usersmoredetails)
    {
        //
    }
    public function clearFilePath($id)
    {

        $filePath =Usersmoredetails::where ('id',$id)->value('files_path');

        if (Storage::disk('imgfolder')->exists($filePath)) {
            // Delete the file
            Storage::disk('imgfolder')->delete($filePath);
        }
        // Update the file_path to null directly
        $updated = Usersmoredetails::where('id', $id)->update([


            'files_path' => null,
        'files_name' => null,
        ]);

        if ($updated) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }
    public function clearFilePathimg($id)
    {
        // Update the file_path to null directly

        $imgPath =Usersmoredetails::where ('id',$id)->value('profil_impath');

        if (Storage::disk('imgfolder')->exists($imgPath)) {
            // Delete the file
            Storage::disk('imgfolder')->delete($imgPath);

        }
        $updated = Usersmoredetails::where('id', $id)->update([


            'profil_impath' => null,

        ]);

        if ($updated) {
            return back()->with('messege', 'File deleted successfully.');
        }

        return back()->with('messege', 'File not found.');
    }


}
