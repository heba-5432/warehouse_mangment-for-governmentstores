<?php

namespace App\Http\Controllers;

use App\Models\DisBonesRole;
use App\Http\Requests\StoreDisBonesRoleRequest;
use App\Http\Requests\UpdateDisBonesRoleRequest;

class DisBonesRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        $Dis = DisBonesRole::all();
        return view('roll_payments.admin_setting.disc_bones_roles',compact('Dis'));

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
    public function store(StoreDisBonesRoleRequest $request)
    {
    $disbonesRole = DisBonesRole::create([

       "dis_title"=>  $request->dis_title,
       "dis_descreption"=> $request->dis_descreption,
       'allowb1'=>$request->allowb1,
'allowb2'=>$request->allowb2,
 'allowb3'=>$request->allowb3,
 'deductb1'=>$request->deductb1,
 'deductb2'=>$request->deductb2,
 'deductb3'=>$request->deductb3,

 "total_dis"=> $request->deductb1 +$request->deductb2 + $request->deductb3,
 "total_bones"=> $request->allowb1 + $request->allowb2 + $request->allowb3,



        'created_by'=>(Auth()->user()->name),
        ]);
    if ($disbonesRole)
    {
        return redirect('/dis_roles')->with('messege','created successfully');
     }
     else {
         return redirect('dis_roles')->with('messege','not saved ,try again');
 }
     }


    /**
     * Display the specified resource.
     */
    public function show(DisBonesRole $disBonesRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DisBonesRole $disBonesRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDisBonesRoleRequest $request,$id)
    {
        $disBonesRole=DisBonesRole::findOrFail($id)->update([

            'dis_title'=> $request->dis_title,
            'dis_descreption'=> $request->dis_descreption,
          'allowb1'=>$request->allowb1,
'allowb2'=>$request->allowb2,
 'allowb3'=>$request->allowb3,
 'deductb1'=>$request->deductb1,
 'deductb2'=>$request->deductb2,
 'deductb3'=>$request->deductb3,

       "total_dis"=> $request->deductb1 +$request->deductb2 + $request->deductb3,
       "total_bones"=> $request->allowb1 + $request->allowb2 + $request->allowb3,

           'edit_by' =>(Auth()->user()->name),
        ]);
        if ($disBonesRole) {
            return redirect('dis_roles')->with('messege','updated successfully');
         }
         else {
             return redirect('dis_roles')->with('messege','not updated ,try again');
     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $delet_item=DisBonesRole::findOrFail($id)->delete();
        if($delet_item){
        return redirect('dis_roles')->with('messege','deleted successfully');
         }
     else{
         return redirect('dis_roles')->with('messege','not deleted try again');
     }
    }
}
