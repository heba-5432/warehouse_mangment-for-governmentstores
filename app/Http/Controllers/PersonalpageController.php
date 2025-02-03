<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class PersonalpageController extends Controller
{

        public function index()
        {


           $id=auth()->user()->id;


                $users_roles =  DB::table('users')

                // Select all value of the user related to finance table
                ->leftjoin('rollpayments', 'users.id', '=', 'rollpayments.user_id')
                ->leftjoin('finance_degrees','users.position_id','=','finance_degrees.id')
                ->select( 'users.*','rollpayments.*','finance_degrees.*','finance_degrees.id as  fintab_id','users.id as user_info_id','rollpayments.id as roll_id') // Select all columns
                ->where('users.id',$id)->get(); ///user information
                  // return  $users_roles;

         $user_position= $users_roles->value('position_id');
        // user relation with finance and discount roles loigc start////
                $degree_dis= DB::table('finance_degrees')
                ->leftJoin('dis_bones_roles','finance_degrees.disrole_id','=','dis_bones_roles.id') //to show all data with relation or noe
                ->leftJoin('users','finance_degrees.id','=','users.position_id')
                ->where('finance_degrees.id',$user_position)
                ->select('finance_degrees.*','dis_bones_roles.*','finance_degrees.id as fintab_id','dis_bones_roles.id as distab_id')->get();
        /// user relation with finance and discount roles loigc end////
              //$all_info=([$degree_dis, $users_roles]);



              return view("roll_payments.personal_info.all_personal_payments",
                compact('degree_dis','degree_dis','users_roles'));
                        //// for table and edit information end//////



            /**
             * Show the form for editing the specified resource.
             */
            }


       //    return view("roll_payments.personal_info.all_personal_payments");


            public function search3(Request $request)
            {



            $id=auth()->user()->id;


            $users_roles =  DB::table('users')

            // Select all value of the user related to finance table
            ->leftjoin('rollpayments', 'users.id', '=', 'rollpayments.user_id')
            ->leftjoin('finance_degrees','users.position_id','=','finance_degrees.id')
            ->select( 'users.*','rollpayments.*','finance_degrees.*','finance_degrees.id as  fintab_id','users.id as user_info_id','rollpayments.id as roll_id') // Select all columns
            ->where('users.id',$id)->get(); ///user information
              // return  $users_roles;

     $user_position= $users_roles->value('position_id');
    // user relation with finance and discount roles loigc start////
            $degree_dis= DB::table('finance_degrees')
            ->leftJoin('dis_bones_roles','finance_degrees.disrole_id','=','dis_bones_roles.id') //to show all data with relation or noe
            ->leftJoin('users','finance_degrees.id','=','users.position_id')
            ->where('finance_degrees.id',$user_position)
            ->select('finance_degrees.*','dis_bones_roles.*','finance_degrees.id as fintab_id','dis_bones_roles.id as distab_id')->get();
    /// user relation with finance and discount roles loigc end////
          //$all_info=([$degree_dis, $users_roles]);



            $user_info1=User::all();

            $request->validate([
'start_date'=>'required',
'end_date'=> 'required',


            ]);
            // Get the search term from the request input
            $start_date = $request->input('start_date'); // 'search' is the input field name
            $end_date = $request->input('end_date');
            $user_id =auth()->user()->id;





            if ($start_date> $end_date)
            {
                return redirect('PersonalpageController')->with('messege', 'start date is bigger than end date');

            }


            // Query the database for users where the name or email matches the search term
            $users_aw =DB::table('rollpayments')
            ->Leftjoin('users','rollpayments.user_id','=','users.id')
            ->where('pay_date', '>=', $start_date )
                         ->Where('pay_date','<=' ,  $end_date )
                         ->Where('user_id', '=',  $user_id )
                         ->orderBy('rollpayments.pay_date','desc')
                         ->get();
                         return view("roll_payments.personal_info.all_personal_payments",
                         compact('users_aw','user_info1','degree_dis','users_roles'));
            // Return a view with the search results





        }


        public function gg( )

{
    $request = auth()->user()->getAuthIdentifier();
    Auth::guard('web')->logout();

   // $request->session()->invalidate();

   // $request->session()->regenerateToken();

    return redirect('/');

}
            }


