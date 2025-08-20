<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library\members;
use App\Models\library\Itemscreate;
use App\Models\library\ItemVersions;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {



    $all_items =Itemscreate::leftJoin('item_versions','itemscreates.id','=','item_versions.main_item_v1')
    ->select('item_versions.*','itemscreates.*','item_versions.id as iver_id')
    ->orderBy('itemscreates.title_ara')
   ->get();
//return $all_items;
        return view('libray_system.Loans_mangments.add_borrow',compact('all_items'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(members $members)
    {
        //
    }
}
