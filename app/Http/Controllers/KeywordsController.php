<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library\keywords;
use Illuminate\Support\Facades\Auth;

class KeywordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $keies = keywords::all();


            return view('libray_system/items_keywords',compact('keies'));
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
        public function store(Request $request)
        {
            $request->validate(
                [
        'title_ar'=>'required',
                ]
                );

    $b_exit=$request['title_ar'];
    if ( keywords::where('ar_title','=', $b_exit)->first()) {
        return redirect('/keywords')->with("messege","this item added before");
    } else {
            $keywords = keywords::create([
     "ar_title"=>strtolower($request->title_ar),
     "En_title"=>strtolower($request->title_eng),
     "description"=>$request->descrption,
     "created_by"=>(Auth::user()->name),

            ]);
            if ($keywords){

      return redirect('/keywords')->with("messege","saved succesfully");
            }
            else{
            return redirect('/keywords')->with("messege","not saved, try again");
            }
        /**
         * Display the specified resource.
         */
    }
        }

        /**
         * Display the specified resource.
         */
        public function show(keywords $keywords)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(keywords $keywords)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, $id)
        {
    $request->validate(
        [
'title_ar'=>'required',
        ]
        );
            $Items_update= keywords::findOrFail($id)->update([
               "ar_title"=>strtolower($request->title_ar),
     "En_title"=>strtolower($request->title_eng),
     "description"=>$request->descrption,
     "created_by"=>(Auth::user()->name),
                 "edit_by"=>(Auth::user()->name),

                           ]);
                     if($Items_update )
                          {
                            return redirect('/keywords')->with("messege","updated succesfully");
                       }
                       else{
                        return redirect('/keywords')->with("messege","not updated, try again");

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
            $item_delete=keywords::findOrFail($id)->delete();

            if($item_delete )
            {
      return redirect('/keywords')->with("messege","deleted succesfully");
         }
         else{
           return redirect('/keywords')->with("messege","not deleted, try again");

      }

        }
    }


