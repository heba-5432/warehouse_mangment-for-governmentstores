<?php

namespace App\Http\Controllers;

use App\Models\Timeschedule;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTimescheduleRequest;
use App\Http\Requests\UpdateTimescheduleRequest;

class TimescheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $timeslots = Timeschedule::all();
   //return  $timeslots;
        return view("roll_payments.admin_setting.timeschdule", compact('timeslots'));
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
    public function store(StoreTimescheduleRequest $request)
    {


$b_exit=$request['time_title'];
if ( Timeschedule::where('time_title','=', $b_exit)->first()) {
    return redirect('/timeschdule')->with("messege","this item added before");
}
    else {
       $time_created= Timeschedule::create([

            'time_title'=> $request['time_title'],
            'time_day'=> $request['time_day'],
            'time_month'=> $request['time_month'],
            'time_year'=> $request['time_year'],
            'start_date_t'=> $request['start_date_t'],
            'end_date_t'=> $request['end_date_t'],
            'created_by'=>(Auth()->user()->name),
        ]);
if ($time_created) {
    return redirect('/timeschdule')->with('messege','created Successfully');

}
else {
    return redirect('/timeschdule')->with('messege','failed to create ,try again');

}
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(Timeschedule $timeschedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timeschedule $timeschedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimescheduleRequest $request,$id)
    {

       $time_update= Timeschedule::findOrFail($id)->update([
            'time_title'=>$request->time_title,
             'time_day'=>$request->time_day,
             'time_month'=>$request->time_month,
             'time_year'=>$request->time_year,
             'start_date_t'=> $request->start_date_t,
             'end_date_t'=> $request->end_date_t,
             'edit_by'=>(Auth::user()->name),

                       ]);
                 if($time_update)
                      {
                return redirect('/timeschdule')->with("messege","updated succesfully");
                   }
                   else{
                     return redirect('timeschdule')->with("messege","not updated, try again");

                }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $time_delete= Timeschedule::findOrFail($id)->delete();

        if($time_delete)
        {
            return redirect('/timeschdule')->with("messege","deleted succesfully");
     }
     else{
        return redirect('timeschdule')->with("messege","not deleted, try again");

  }
    }
}
