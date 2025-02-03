<?php

namespace App\Http\Controllers;

use App\Models\Roles;
//use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validate;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $roles = Roles::all();

        return view('roll_payments.admin_setting.roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolesRequest $request)
    {

$b_exit=$request['role_title'];
if ( Roles::where('role_title','=', $b_exit)->first()) {
    return redirect('/roles')->with("messege","this item added before");
} else {
        $roles = Roles::create([
 "role_title"=>strtolower($request->role_title),
 "role_description"=>$request->role_description,
 "created_by"=>(Auth::user()->name),

        ]);
        if ($roles){

  return redirect('/roles')->with("messege","saved succesfully");
        }
        else{
        return redirect('roles')->with("messege","not saved, try again");
        }
    /**
     * Display the specified resource.
     */
}
    }
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, $id)
    {

           $role_update= Roles::findOrFail($id)->update([
"role_title"=>strtolower($request->role_title),
 "role_description"=>$request->role_description,
 "edit_by"=>(Auth::user()->name),

           ]);
     if($role_update )
          {
    return redirect('/roles')->with("messege","updated succesfully");
       }
       else{
         return redirect('roles')->with("messege","not updated, try again");

    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role_delete= Roles::findOrFail($id)->delete();

        if($role_delete )
        {
  return redirect('/roles')->with("messege","deleted succesfully");
     }
     else{
       return redirect('roles')->with("messege","not deleted, try again");

  }


    }
}
