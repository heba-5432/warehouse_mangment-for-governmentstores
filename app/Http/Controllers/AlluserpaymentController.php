<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Emailreport;
use App\Models\Rollpayment;
use App\Models\Timeschedule;
use Illuminate\Http\Request;
use App\Mail\UseremailPayment;
use App\Models\Alluserpayment;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\returnValue;

class AlluserpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_info1=User::all();
        $users_aw =rollpayment::Leftjoin('users','rollpayments.user_id','=','users.id')
        ->select('users.*','rollpayments.*','rollpayments.id as roll_id')
        ->orderBy('rollpayments.pay_date','desc')
       ->get();

        return view('roll_payments.users_info.all_payments',compact('user_info1','users_aw'));
    }

    /**
     * Show the form for creating a new resource.
     */


             public function search(Request $request)
        {
            $user_info1=User::all();

            $request->validate([
'start_date'=>'required',
'end_date'=> 'required',


            ]);
            // Get the search term from the request input
            $start_date = $request->input('start_date'); // 'search' is the input field name
            $end_date = $request->input('end_date');
            $user_id = $request->input('user_id');





            if ($start_date> $end_date){
                return redirect('all_payments')->with('messege', 'start date is bigger than end date');

            }
          else

{
    if ($user_id){
            // Query the database for users where the name or email matches the search term
            $users_aw =DB::table('rollpayments')
            ->Leftjoin('users','rollpayments.user_id','=','users.id')
            ->where('pay_date', '>=', $start_date )
                         ->Where('pay_date','<=' ,  $end_date )
                         ->Where('user_id', '=',  $user_id )
                         ->orderBy('rollpayments.pay_date','desc')
                         ->get();
                         return view('roll_payments.users_info.all_payments',compact('users_aw','user_info1'));
            // Return a view with the search results
    }
    else

    {
 $users_aw =DB::table('rollpayments')
            ->Leftjoin('users','rollpayments.user_id','=','users.id')
            ->where('pay_date', '>=', $start_date )
                         ->Where('pay_date','<=' ,  $end_date )
                         ->orderBy('rollpayments.pay_date','desc')
                         ->get();
                         return view('roll_payments.users_info.all_payments',compact('users_aw','user_info1'));
            // Return a view with the search results
    }
        }

    }
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
    public function show($alluserpayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $alluserpayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

            return redirect('all_payments')->with('messege','updated successfully');
            }

        else{
            return redirect('all_payments')->with('messege','not updated try again');
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $UserId=Rollpayment::findOrFail($id)->value('user_id');
            $delet_item=Rollpayment::findOrFail($id)->delete();

               if($delet_item){

                return redirect('all_payments')->with('messege','deleted successfully');
                }

            else{
                return redirect('all_payments')->with('messege','not deleted try again');
        }
    }

}

public function bluckemail( Request $request)
{
    $request->validate([
'start_date1'=> 'required',
'end_date1'=>'required',
    ]);


    $start_date=$request->start_date1;
   $end_date=$request->end_date1;
   $user_id2=$request->user_id2;

   // if user not choosen
if(!$user_id2){
    //$id for the choise for date period to send
   $date_now= Carbon::now('Africa/Cairo');
   $date2= $date_now->format('d');

  //  $timeslots = Timeschedule::where('time_day',$date2)->get();
 // $userIds = User::all();

 //get all users which have payments in this period
 $emailsto= Rollpayment::where('pay_date', '>=',   $start_date )
  ->Where('pay_date','<=' ,  $end_date)->pluck('user_id');
 //$user_id= $userIds->pluck('id');
$i=0;
 foreach ($emailsto as $id) {

    $i++;
     $id . "\n";  // or any other operation you want to perform on each ID

    $users_aw  =Rollpayment::leftJoin('users','rollpayments.user_id','=','users.id')
    ->where('pay_date', '>=',   $start_date )
                 ->Where('pay_date','<=' ,  $end_date)
             ->Where('rollpayments.user_id', '=', $id)
                 ->orderBy('rollpayments.pay_date','desc')
                ->select('users.*','rollpayments.*','users.id as userf_id')->get();
             $z = $users_aw->value('email');
             try {
    Mail::to($users_aw->value('email'))->send(new UseremailPayment($users_aw ));
            // echo  "email send to :". $users_aw->value('email') ;
            $item = new  Emailreport; //model to save in database

    $item->emstatus='sent';
    $item->emuser_id= $users_aw->value('userf_id');
    $item->emuser_national=$users_aw->value('national_id');
    $item->emdate=$date_now;
            }
           catch (Exception)  {
                $item = new  Emailreport;
    $item->emstatus=' faild to send';
    $item->emuser_id= $users_aw->value('userf_id');
    $item->emuser_national=$users_aw->value('national_id');
    $item->emdate=$date_now;
             }

$item->save();
Log::error("Failed to send email to {$users_aw->value('email')}: " );
}
return redirect('all_payments')->with('messege',' emails send ,check report');

}

else{

 $date_now= Carbon::now('Africa/Cairo');

/// email to certain user

   $users_aw  =Rollpayment::leftJoin('users','rollpayments.user_id','=','users.id')
    ->where('pay_date', '>=',   $start_date )
                 ->Where('pay_date','<=' ,  $end_date)
             ->Where('rollpayments.user_id', '=', $user_id2)
                 ->orderBy('rollpayments.pay_date','desc')
                ->select('users.*','rollpayments.*')->get();
                $df= $users_aw->pluck('email');
                Mail::to($users_aw->value('email'))->send(new UseremailPayment($users_aw ));

                     $item = new  Emailreport;
                     if($df){

                        $item->emstatus='sent';
                                 }
                         else{
                        $item->emstatus=' faild to send';
                                 }
                        $item->emuser_id= $user_id2;
                        $item->emuser_national=$users_aw->value('national_id');
                        $item->emdate=$date_now;
                        $item->save();

           return redirect('all_payments')->with('messege',' emails send ,check report');


           // echo  "email send to :". $users_aw->value('email') ;

}
}

public function excute($userIds)

{


    for($i= 0; $i < count($userIds); $i++)
    {
        $user_id=$userIds->pluck('id');
        //  echo $user_id ;
foreach( $user_id as $user){
    $users_aw  =Rollpayment::leftJoin('users','rollpayments.user_id','=','users.id')
             ->Where('rollpayments.user_id', '=',$user)
                 ->orderBy('rollpayments.pay_date','desc')
                ->select('users.*','rollpayments.*')->get();
               echo $users_aw ;

}
    }

}


}










