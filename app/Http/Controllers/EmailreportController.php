<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Emailreport;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\StoreEmailreportRequest;
use App\Http\Requests\UpdateEmailreportRequest;

class EmailreportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_info1=User::all();
        $users_aw =Emailreport::Leftjoin('users','emailreports.emuser_id','=','users.id')
        ->select('users.*','emailreports.*','emailreports.id as emuser_id1')
        ->orderBy('emailreports.emdate','desc')
       ->get();
     return view('roll_payments.users_info.email_report',compact('users_aw','user_info1'));
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
    public function store(StoreEmailreportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Emailreport $emailreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emailreport $emailreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmailreportRequest $request, Emailreport $emailreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {

            $delet_item=Emailreport::findOrFail($id)->delete();

               if($delet_item){

                return redirect('emails_report')->with('messege','deleted successfully');
                }

            else{
                return redirect('emails_report')->with('messege','not deleted try again');
        }
    }

    }
    public function destroy2()
    {



            $delet_item=Emailreport::truncate()->get();

               if($delet_item){

                return redirect('emails_report')->with('messege','deleted  all successfully');
                }

            else{
                return redirect('emails_report')->with('messege','not deleted try again');

    }

    }

    public function search1(StoreEmailreportRequest $request)
    {
        $user_info1=User::all();
$start=$request->start_date;
$end=$request->end_date ;
$user=$request->user_id;


$emailreport = Emailreport::Leftjoin("users","emailreports.emuser_id","=","users.id");


if ( !$user &&  !$start && !$end  )


   {

    $users_aw =Emailreport::Leftjoin("users","emailreports.emuser_id","=","users.id")
    ->orderBy('emailreports.emdate','desc')
    ->get();
    }

    if ( $user &&  $start && $end ) {

        $users_aw = Emailreport::Leftjoin("users","emailreports.emuser_id","=","users.id")
        ->where('emdate', '>=', $start)
        ->where('emdate', '<=',  $end )
        ->where('emuser_id', '=', $user)->orderBy('emailreports.emdate','desc')
        ->get();
    }
    if ( !$user &&  $start && $end ) {

        $users_aw =  Emailreport::Leftjoin("users","emailreports.emuser_id","=","users.id")
        ->where('emdate', '>=', $start)
        ->where('emdate', '<=',  $end )->orderBy('emailreports.emdate','desc')
        ->get();
    }

    if ( $user &&  !$start && !$end ) {

        $users_aw = Emailreport::Leftjoin("users","emailreports.emuser_id","=","users.id")

        ->where('emuser_id', '=', $user)->orderBy('emailreports.emdate','desc')
        ->get();;
    }



    return view('roll_payments.users_info.email_report',compact('users_aw','user_info1'));

}
}
