<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use App\Models\Roles;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\DisBonesRole;
use Illuminate\Http\Request;
use App\Models\FinanceDegree;
use App\Imports\UsersImportUpdate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles1 =Roles::count();
        if($roles1==0){

        $roles = Roles::create([
            "role_title"=>strtolower('super_admin'),
            "role_description"=>"full permission",

        ]);
        $roles = Roles::create([
            "role_title"=>strtolower('admin'),
            "role_description"=>"editor permission",

        ]);
        $roles = Roles::create([
            "role_title"=>strtolower('viewer'),
            "role_description"=>"viewer permission",

        ]);
         $roles = Roles::create([
            "role_title"=>strtolower('store_admin'),
            "role_description"=>"viewer permission",

        ]);

    };




        $deduct1 =DisBonesRole::count();
        if($deduct1==0){
               $deduct_role= DisBonesRole::create([

                   'dis_title'=>strtolower('general_deduct_role'),
                   'dis_descreption'=>strtolower('deduct or allowence =0%'),
               ]);
           };
           $id_deduct=DisBonesRole::where('dis_title','=','general_deduct_role')->value('id');

           $deduct= FinanceDegree::count();
           if($deduct==0){
           $financedegree=FinanceDegree::create([

               'fin_title'=>strtolower('general_degree'),
               'fin_descreption'=>strtolower('salary =0 LE'),
                'disrole_id'=>$id_deduct,
           ]);
        }
// only show user with roles relation
         $fin_d=FinanceDegree::all(); //for form  create

        $roles_info = Roles::all(); //for select option //for form create

//// for table and edit information start//////
        $users_roles= DB::table('users')
        ->leftJoin('roles','users.role_id','=','roles.id') //to show all data with relation or noe
        ->leftJoin('finance_degrees','users.position_id','=','finance_degrees.id')
        ->select('users.*','roles.*','users.id as user_info_id','roles.id as rolestable_id','finance_degrees.*','finance_degrees.id as fintable_id')->get();
       // return $users_roles;
        return view('roll_payments.users_info.addusers',compact('roles_info','users_roles','fin_d'));
                 //// for table and edit information end//////
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
            'name' => 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'password' => 'required',
            'role_id'=> 'required',
            'national_id'=>'required|unique:users',

        ]);
if ($request['password']!=$request['password_confirmed']) {
    return redirect('/users')->with('messege','The password confirmed field confirmation does not match');
}
        else
        {
           $userInfo = User::create([

            'name'=> $request['name'],
            'email'=>strtolower( $request['email']),
            'password'=> Hash::make($request['password']),
            'national_id'=> $request['national_id'],
            'role_id'=>implode(',', $request['role_id']),
            'created_by'=>(Auth()->user()->name),
'position_id'=>$request['position_id'],
'depar_id'=>$request['depar_id'],

           ]);

  if ($userInfo) {
           return redirect('users')->with('messege','created successfully');
        }
        else {
            return redirect('users')->with('messege','not saved ,try again');
    }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $fin_d=FinanceDegree::all(); //for form  create

        $roles_info = Roles::all();
        $users_roles= DB::table('users')
        ->leftJoin('roles','users.role_id','=','roles.id') //to show all data with relation or noe
        ->leftJoin('finance_degrees','users.position_id','=','finance_degrees.id')
        ->select('users.*','roles.*','users.id as user_info_id','roles.id as rolestable_id','finance_degrees.*','finance_degrees.id as fintable_id')->get();
       // return $users_roles;
        return view('roll_payments.users_info.all_users',compact('roles_info','users_roles','fin_d'));
        //// for table and edit information end//////
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {



        $user_role=User::where('id',$id)->value('role_id');// user need to edit

        $Id1= Roles::where('role_title','=','super_admin')->value('id');
        $Id2= Roles::where('role_title','=','admin')->value('id');

// your role is super admin
        if (Auth::user()->role_id == $Id1 ){
        $userInfo = User::where ('id',$id)->update([

                'name'=> $request['name'],
                'email'=>strtolower( $request['email']),

                'national_id'=> $request['national_id'],
            'role_id'=>implode(',', $request['role_id']),

            'created_by'=>(Auth()->user()->name),
'position_id'=>$request['position_id'],
'depar_id'=>$request['depar_id'],
'adminnotreviewd'=>1,

           ]);
           if ($userInfo) {
            return redirect('users')->with('messege','updated successfully');
         }
         else {
             return redirect('users')->with('messege','not updated ,try again');
     }
        }
        if ((Auth::user()->role_id != $Id1) and ((Auth::user()->id ==$id)))  {

            $userInfo = User::where ('id',$id)->update([

                'name'=> $request['name'],
                'email'=>strtolower( $request['email']),
    //'role_id'=> $request['role_id'],
                'national_id'=> $request['national_id'],
            'created_by'=>(Auth()->user()->name),
    'position_id'=>$request['position_id'],
    'depar_id'=>$request['depar_id'],
'adminnotreviewd'=>1,
           ]);
           if ($userInfo) {
            return redirect('users')->with('messege','updated successfully');
         }
         else {
             return redirect('users')->with('messege','not updated ,try again');
     }

        }

        // user role want to update is super admin and youare is admin  couldnot edit it
        if ((Auth::user()-> role_id  == $Id2) &&( $user_role== $Id1))  {
            $userInfo = User::where ('id',$id)->update([

                    'name'=> $request['name'],
                    'email'=>strtolower( $request['email']),
//'role_id'=> $request['role_id'],
                    'national_id'=> $request['national_id'],
                'created_by'=>(Auth()->user()->name),
    'position_id'=>$request['position_id'],
    'depar_id'=>$request['depar_id'],
'adminnotreviewd'=>1,
               ]);

               if ($userInfo) {
                return redirect('users')->with('messege','updated successfully');
             }
             else {
                 return redirect('users')->with('messege','not updated ,try again');
         }

        }
        else{

            if ((Auth::user()->role_id == $Id2) &&( $user_role != $Id1))  {

            $userInfo = User::where ('id',$id)->update([

                'name'=> $request['name'],
                'email'=>strtolower( $request['email']),
'role_id'=> $request['role_id'],
                'national_id'=> $request['national_id'],
            'created_by'=>(Auth()->user()->name),
'position_id'=>$request['position_id'],
'depar_id'=>$request['depar_id'],
'adminnotreviewd'=>1,
           ]);


           if ($userInfo) {
            return redirect('users')->with('messege','updated successfully');
         }
         else {
             return redirect('users')->with('messege','not updated ,try again');
     }
    }

     /// incase login user is admin and want to upgrade himself to super admin cannot do this


    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $user_role=User::where('id',$id)->get();
        if ((Auth::user()->role_id) ==($id))// donot delete your own account
        {
            return redirect('users')->with('messege','cannot delete your account ');
        }



                $Id1= Roles::where('role_title','=','super_admin')->value('id');
                $Id2= Roles::where('role_title','=','admin')->value('id');


                if (auth()->user()->role_id== $Id1 ){  // if you are super admin could delete all accounts


           $delet_item=user::findOrFail($id)->delete();
           if($delet_item){
           return redirect('users')->with('messege','deleted successfully');
           }
        }
// if your roles les than
           // user you want to delete  cannot do this

           $dd=Auth::user()->role_id;
           if ((Auth::user()->role_id == $Id2) &&( $user_role->value('role_id') == $Id1))  {
            return redirect('users')->with('messege','cannot delete');

           }

else{
    $delet_item=user::findOrFail($id)->delete();
    if($delet_item){
    return redirect('users')->with('messege','deleted successfully');
    }

        else{
            return redirect('users')->with('messege','not deleted try again');
        }
        }

    }
    public function reset_pass(Request $request,$id)
    {

        $user_role=User::where('id',$id)->get();// user need to edit

        $Id1= Roles::where('role_title','=','super_admin')->value('id');
        $Id2= Roles::where('role_title','=','admin')->value('id');

// your role is super admin
        if (Auth::user()->role_id == $Id1 ){


           $pass=user::findOrFail($id)->update([

            'password'=> Hash::make($request['password']),
           ]);

           if($pass){
           return redirect('users')->with('messege','password reseted successfully');
            }
        else{
            return redirect('users')->with('messege','not reset again');
        }
    }

    if ((Auth::user()->role_id == $Id2) &&( $user_role->value('role_id') == $Id1))  {
        return redirect('users')->with('messege','cannot reset ask superadmin ');

       }
else{

    $pass=user::findOrFail($id)->update([

        'password'=> Hash::make($request['password']),
       ]);

       if($pass){
       return redirect('users')->with('messege','password reseted successfully');
        }
    else{
        return redirect('users')->with('messege','not reset again');
    }


}



    }


    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
            $request->validate([
            'file_users_upload'=>' required|mimes:xls,xlsx|max:5240', // 5MB max size
             'name' => 'string|max:255',
          //  'email'=> 'string|max:255|unique:users',
            'national_id'=>'unique:users',

       ] );

        Excel::import(new UsersImport,$request->file('file_users_upload'), \Maatwebsite\Excel\Excel::XLSX);

        return redirect('/users')->with('messege', ' uploades succesfully');
    }
    public function updateimport(Request $request)
    {
        $request->validate([
            'file_users_update'=>' required|mimes:xls,xlsx|max:5240', // 5MB max size
             'name' => 'string|max:255',
            'email'=> 'string|max:255|unique:users',
            'national_id'=>'unique:users',

       ] );
       Excel::import(new UsersImportUpdate,$request->file('file_users_update') );

        return redirect('/users')->with('messege', ' uploades succesfully');
    }

//return "update file";





public function deleteSelected(Request $request)
{
    $request->validate([
       'itemselected'=>'required',

   ] );


   $inputArray =$request->itemselected;

//check if login user is selected
$login_userid=Auth::user()->id;

if(!empty($inputArray)){
if(in_array( $login_userid, $inputArray))
{
    return redirect('users/show_all')->with('messege','cannot delete your account,uncheck it  ');
}
}




  //return $request;
   // $inputArray=$request->itemselected;
   $login_roleid=Auth::user()->role_id;
    $Id1= Roles::where('role_title','=','super_admin')->value('id');//superaadmin
    $Id2= Roles::where('role_title','=','admin')->value('id'); //admin
    if ( $login_roleid== $Id1){


        $delet_item = User::whereIn('id', $inputArray)->delete();
        if($delet_item){
            return redirect('users/show_all')->with('messege','deleted successfully');
            }
            else{
                return redirect('users/show_all')->with('messege','not deleted try again');
            }

        }

   // $login_roleid=Auth::user()->role_id;
else{
    if ( $login_roleid== $Id2){

// check if deleted user is super admin donot delete if  login user is admin

$z[]=User::whereIn('id', $inputArray)->value('role_id');


if(in_array(  $Id1, $z))
{
    return redirect('users')->with('messege','cannot delete super admin account,uncheck it  ');
}
else {
// users are not superadmin
    $delet_item = User::whereIn('id', $inputArray)->delete();
        if($delet_item){
            return redirect('users')->with('messege','deleted successfully');
            }
            else{
                return redirect('users')->with('messege','not deleted try again');
            }

}
    }
}
/*
if(in_array( $Id1, $z))
{
    return redirect('users')->with('messege','cannot delete superadmin,uncheck it  ');
}

    }
}
/*if(in_array( $Id1, $role_user))
{
    return redirect('users')->with('messege','cannot delete suber admin account,uncheck it  ');
}



}
/*

if ( $login_roleid== $Id1){


    $delet_item = User::whereIn('id', $inputArray)->delete();
    if($delet_item){
        return redirect('users')->with('messege','deleted successfully');
        }
        else{
            return redirect('users')->with('messege','not deleted try again');
        }

    }
    if ( $login_roleid== $Id2){

// check if deleted user is super admin donot delete if  login user is admin

//$role_user=User::whereIn('id', $inputArray)->get();

return "not admin";


/*if(in_array( $Id1, $role_user))
{
    return redirect('users')->with('messege','cannot delete suber admin account,uncheck it  ');
}

else{

$delet_item = User::whereIn('id', $inputArray)->delete();
        if($delet_item){
            return redirect('users')->with('messege','deleted successfully');
            }
            else{
                return redirect('users')->with('messege','not deleted try again');
            }

        }

    }

    }
*/


}


}


