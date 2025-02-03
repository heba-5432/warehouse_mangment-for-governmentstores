<?php

namespace App\Http\Controllers;
use App\Models\DisBonesRole;
use App\Models\FinanceDegree;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFinanceDegreeRequest;
use App\Http\Requests\UpdateFinanceDegreeRequest;

class FinanceDegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disct = DisBonesRole::all(); //for select option
        $finan=DB::table('finance_degrees')
        ->leftJoin('dis_bones_roles','finance_degrees.disrole_id','=','dis_bones_roles.id') //to show all data with relation or noe
        ->select('finance_degrees.*','dis_bones_roles.*',
        'dis_bones_roles.id  as  dis_bones_id','finance_degrees.id as fic2_id')
        ->get();
       // return $users_roles;*/
        return view('roll_payments.admin_setting.finance_degree_info',compact('disct','finan'));

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

    public function store(StoreFinanceDegreeRequest $request)
    {





                  $Fin_dgree = FinanceDegree::create([
 'fin_title'=>$request->fin_title,
 'fin_descreption'=>$request->fin_descreption,
 'salary'=>$request->salary,
 'disrole_id'=>$request->disrole_id,
 'allow1'=>$request->allow1,
 'allow2'=>$request->allow2,
 'allow3'=>$request->allow3,
 'deduct1'=>$request->deduct1,
 'deduct2'=>$request->deduct2,
 'deduct3'=>$request->deduct3,
 'fin_ser'=>$request->fin_ser,
 'total_deduct'=> $request->deduct1 +$request->deduct2 + $request->deduct3,
'total_allow'=> $request->allow1 + $request->allow2 + $request->allow3,
 "created_by"=>(Auth::user()->name),

        ]);
        if ($Fin_dgree){
// role to update allownce + deduction
$g=FinanceDegree::where('fin_ser',$request->fin_ser)->get();



    $number=$g->value('salary');
    $percentage_dis= $g->value('total_deduct');
    $percentage_bones= $g->value('total_allow');
    $id2= $g->value('fin_ser');


          $amount_dis= ($number * $percentage_dis) / 100;
            $totaldis=$number- $amount_dis;
            $amount_bones= ($number* $percentage_bones) /100;
            $totalbon=$number+ $amount_bones;
            $all_total= $number+($amount_bones-$amount_dis);


            $zr=FinanceDegree::where('fin_ser',$id2)->update([
'total_after_deduct'=>$totaldis,

'total_after_allow'=>$totalbon,


'total_of_all'=> $all_total,

]);

if ($zr){
  return redirect('/finan_info')->with("messege","saved succesfully");
        }
        else{
        return redirect('finan_info')->with("messege","not saved, try again");
        }
    /**
     * Display the specified resource.




     * Display the specified resource.
     */
    }
}

    public function show(FinanceDegree $financeDegree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinanceDegree $financeDegree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinanceDegreeRequest $request, $id)
    {


        $fin_update= FinanceDegree::where('id',"=",$id)->update([
            "fin_title"=>$request->fin_title,
             "fin_descreption"=>$request->fin_descreption,
             "disrole_id"=>$request->disrole_id,
             "edit_by"=>(Auth::user()->name),
             "salary"=>$request->salary,
             'allow1'=>$request->allow1,
 'allow2'=>$request->allow2,
 'allow3'=>$request->allow3,
 'deduct1'=>$request->deduct1,
 'deduct2'=>$request->deduct2,
 'deduct3'=>$request->deduct3,
 'total_deduct'=> $request->deduct1 +$request->deduct2 + $request->deduct3,
'total_allow'=> $request->allow1 + $request->allow2 + $request->allow3,
                       ]);
                 if($fin_update )
                      {
                        $g=FinanceDegree::where('id',$id)->get();
                        $number=$g->value('salary');
                        $percentage_dis= $g->value('total_deduct');
                        $percentage_bones= $g->value('total_allow');
                        $id2= $g->value('fin_ser');


                              $amount_dis= ($number * $percentage_dis) / 100;
                                $totaldis=$number- $amount_dis;
                                $amount_bones= ($number* $percentage_bones) /100;
                                $totalbon=$number+ $amount_bones;
                                $all_total= $number+($amount_bones-$amount_dis);


                                $zr=FinanceDegree::where('fin_ser',$id2)->update([
                    'total_after_deduct'=>$totaldis,

                    'total_after_allow'=>$totalbon,


                    'total_of_all'=> $all_total,]);


if( $zr){

                return redirect('/finan_info')->with("messege","updated succesfully");
                   }
                   else{
                     return redirect('finan_info')->with("messege","not updated, try again");

                }
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fin_delete= FinanceDegree::where('id',"=",$id)->delete();

        if($fin_delete )
        {
  return redirect('/finan_info')->with("messege","deleted succesfully");
     }
     else{
       return redirect('finan_info')->with("messege","not deleted, try again");

  }
    }
}
