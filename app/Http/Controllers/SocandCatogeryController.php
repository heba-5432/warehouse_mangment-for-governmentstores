<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\library\socandCatogery;
use App\Http\Requests\StoresocandCatogeryRequest;
use App\Http\Requests\UpdatesocandCatogeryRequest;

class SocandCatogeryController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
           $Catogery2 = socandCatogery::all();

            return view('libray_system/items_catogery2',compact('Catogery2'));
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
        public function store(StoresocandCatogeryRequest $request)
        {


    $b_exit=$request['title_ar'];
    if ( socandCatogery::where('ar_title','=', $b_exit)->first()) {
        return redirect('/catogery2')->with("messege","this item added before");
    } else {
            $socandCatogery = socandCatogery::create([
     "ar_title"=>strtolower($request->title_ar),
     "En_title"=>strtolower($request->title_eng),
     "description"=>$request->descrption,
     "created_by"=>(Auth::user()->name),

            ]);
            if ($socandCatogery){

      return redirect('/catogery2')->with("messege","saved succesfully");
            }
            else{
            return redirect('/catogery2')->with("messege","not saved, try again");
            }
        /**
         * Display the specified resource.
         */
    }
        }

        /**
         * Display the specified resource.
         */
        public function show(socandCatogery $socandCatogery)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(socandCatogery $socandCatogery)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdatesocandCatogeryRequest $request, $id)
        {

            $Items_update= socandCatogery::findOrFail($id)->update([
               "ar_title"=>strtolower($request->title_ar),
     "En_title"=>strtolower($request->title_eng),
     "description"=>$request->descrption,
     "created_by"=>(Auth::user()->name),
                 "edit_by"=>(Auth::user()->name),

                           ]);
                     if($Items_update )
                          {
                            return redirect('/catogery2')->with("messege","updated succesfully");
                       }
                       else{
                        return redirect('/catogery2')->with("messege","not updated, try again");

                    }
                }

                    /**
                     * Remove the specified resource from storage.
                     */


        /**
         * Remove the specified resource from storage.
         */
        public function destroy($id)
        {
            $item_delete=socandCatogery::findOrFail($id)->delete();

            if($item_delete )
            {
      return redirect('/catogery2')->with("messege","deleted succesfully");
         }
         else{
           return redirect('/catogery2')->with("messege","not deleted, try again");

      }

        }
    }
