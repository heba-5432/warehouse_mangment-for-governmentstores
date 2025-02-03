<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CheckUseridController extends Controller
{
    public function index(){

        return view('auth.logincheck');

    }

    public function comapre(Request $request)
    {
      //  return $request;


$id= $request->nat_id;

$request->validate([

    'nat_id'=>'required',

]);
$z=User::all();
$r=$z->where('national_id','=',$id)->first();

//return $r;

if ($r )
{

return view('auth.register',compact('id'))->with('messege','please continue register your information');

}
else {
    return redirect('checklogin')->with('messege','your information is not register ,contact admin to add your info');

}

    }




}
