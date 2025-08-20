<?php

namespace App\Http\Controllers;



use App\Models\Rollpayment;




use Illuminate\Support\Str;

use App\Models\FinanceDegree;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use App\Http\Requests\StoreRollpaymentRequest;
use App\Http\Requests\UpdateRollpaymentRequest;

class RollpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
//id for payment
    {


        return view('roll_payments.users_info.payment_bones_add');

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
    public function store(StoreRollpaymentRequest $request)
    {

    $rollpayment=rollpayment::create([

        'pay_title'=> $request->pay_title ,
        'pay_date'=> $request->pay_date,
        'payment_value'=> $request->payment_value,
        'user_id'=> $request->user_id,
        'discnt_role_id'=> $request->discnt_role_id,
        'financ_id'=> $request->financ_id,
        'created_by'=>(Auth()->user()->name),
        'serial_number'=>Str::uuid($request->serial_number),//if you’re using a custom ID system (e.g., UUIDs), you might need to ensure the uniqueness of the IDs. You can generate UUIDs


    ]);
       session(['user_id' =>$request->user_id,]);
        $userId = session('user_id');
        session(['serial_number' =>$request->serial_number,]);
        $serial = session('serial_number');
      //  return  $userId;
     if($rollpayment){
        ////////////////////////////////////////////////////////////////////////////
$roll=DB::table('rollpayments')->where('serial_number',$serial)
->leftJoin('dis_bones_roles','rollpayments.discnt_role_id','=','dis_bones_roles.id')
->where('serial_number',$serial)
->select('dis_bones_roles.*','rollpayments.*')->get();



$number=$roll->value('payment_value');
$percentage_dis= $roll->value('total_dis');
$percentage_bones= $roll->value('total_bones');
$id2= $roll->value('serial_number');


      $amount_dis= ($number* $percentage_dis) / 100;
        $totaldis=$number- $amount_dis;
        $amount_bones= ($number* $percentage_bones) /100;
        $totalbon=$number+ $amount_bones;
        $all_total=($number+$amount_bones-$amount_dis);

       // return  $all_total. $totalbon. $amount_bones. $totaldis. $amount_dis;
        //return $all_y;






       Rollpayment:: where('serial_number',$id2)->update([
            'total_after_dis'=>$totaldis,
            'total_after_reword'=>$totalbon,
            'total_after_add_dis'=>$all_total,


        ]);


/////////////////////////////////////////////////////////////////
    return redirect()->route('payment_bones.show',$userId)->with('messege','created succesfully');
    }
    else{
        return redirect('payment_bones.show',$userId)->with('messege',' failed to create');
    }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users_roles =  DB::table('users')

        // Select all value of the user related to finance table
        ->leftjoin('rollpayments', 'users.id', '=', 'rollpayments.user_id')
        ->leftjoin('finance_degrees','users.position_id','=','finance_degrees.id')
        ->select( 'users.*','rollpayments.*','finance_degrees.*','finance_degrees.id as  fintab_id','users.id as user_info_id','rollpayments.id as roll_id') // Select all columns
        ->where('users.id',$id)->get(); ///user information
          // return  $users_roles;
          $id_degree=FinanceDegree::where('fin_title','=','general_degree')->value('id');


 $user_position= $users_roles->value('position_id');

 if(empty($user_position)){
    $user_position=$id_degree;
 }
 else{

    $user_position= $users_roles->value('position_id');
 }
// user relation with finance and discount roles loigc start////
        $degree_dis= DB::table('finance_degrees')
        ->leftJoin('dis_bones_roles','finance_degrees.disrole_id','=','dis_bones_roles.id') //to show all data with relation or noe
        ->leftJoin('users','finance_degrees.id','=','users.position_id')
        ->where('finance_degrees.id',$user_position)
        ->select('finance_degrees.*','dis_bones_roles.*','finance_degrees.id as fintab_id','dis_bones_roles.id as distab_id')->get();
/// user relation with finance and discount roles loigc end////
      //$all_info=([$degree_dis, $users_roles]);



        return view('roll_payments.users_info.payment_bones_add',
        compact('degree_dis','degree_dis','users_roles'));
                //// for table and edit information end//////



    /**
     * Show the form for editing the specified resource.
     */
    }
    public function edit(Rollpayment $rollpayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRollpaymentRequest $request,  $id)
    {

        $info=Rollpayment::where('id',$id)->get();

        $roll_update=rollpayment::where('id',$id)->update([

            'pay_title'=> $request->pay_title ,
            'pay_date'=> $request->pay_date,
            'payment_value'=> $request->payment_value,

        ]);


/////////////////////////////////////////////////

        $userId = $info->value('user_id');

        $serial =$info->value('serial_number');
       // return  [$userId, $serial];
     if($roll_update){
        ////////////////////////////////////////////////////////////////////////////
$roll=DB::table('rollpayments')->where('serial_number',$serial)
->leftJoin('dis_bones_roles','rollpayments.discnt_role_id','=','dis_bones_roles.id')
->where('serial_number',$serial)
->select('dis_bones_roles.*','rollpayments.*')->get();



$number=$roll->value('payment_value');
$percentage_dis= $roll->value('total_dis');
$percentage_bones= $roll->value('total_bones');
$id2= $roll->value('serial_number');


      $amount_dis= ($number * $percentage_dis) / 100;
        $totaldis=$number- $amount_dis;
        $amount_bones= ($number* $percentage_bones) /100;
        $totalbon=$number+ $amount_bones;
        $all_total=($number+$amount_bones-$amount_dis);

       // return  $all_total. $totalbon. $amount_bones. $totaldis. $amount_dis;
        //return $all_y;






       Rollpayment:: where('serial_number',$id2)->update([

            'total_after_dis'=>$totaldis,
            'total_after_reword'=>$totalbon,
            'total_after_add_dis'=>$all_total,


        ]);
            //////////////////////////

            return redirect()->route('payment_bones.show',$userId)->with('messege','updated successfully');
            }

        else{
            return redirect()->route('payment_bones.show',$userId)->with('messege','not updated try again');
    }


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $UserId=Rollpayment::findOrFail($id)->value('user_id');
        $delet_item=Rollpayment::findOrFail($id)->delete();

           if($delet_item){

            return redirect()->route('payment_bones.show',$UserId)->with('messege','deleted successfully');
            }

        else{
            return redirect()->route('payment_bones.show',$UserId)->with('messege','not deleted try again');
    }
}
}
