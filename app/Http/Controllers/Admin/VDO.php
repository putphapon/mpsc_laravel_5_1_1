<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscVdo;

class VDO extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select
        $vdo = MpscVdo::all();

        return view('admin.vdo-admin', ['vdo' => $vdo]);
    }

    /**
     * Show the from for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request = null)
    {
        $search = $request->search;
        $vdo = DB::table('mpsc_vdos')->where('vdo_name','like','%'.$search.'%')->get();
    
        return view('admin.vdo-admin', ['vdo' => $vdo]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,
            [
                'nameVDO' => 'required',
                'detailVDO' => 'required',
                'linkVDO' => 'required'
            ]
        );

        //create
        $vdo = new MpscVdo;
        $vdo->vdo_name = $request->nameVDO;
        $vdo->vdo_detail = $request->detailVDO;
        $vdo->vdo_link = $request->linkVDO;

        //save
        $vdo->save();

        return  redirect()->action('Admin\VDO@index')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the from for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request,
            [
                'nameVDO' => 'required',
                'detailVDO' => 'required',
                'linkVDO' => 'required'
            ]
        );

        //search from id
        $vdo = MpscVdo::find($id);

        //define
        $vdo->vdo_name = $request->nameVDO;
        $vdo->vdo_detail = $request->detailVDO;
        $vdo->vdo_link = $request->linkVDO;

        //save
        $vdo->save();

        return  redirect()->action('Admin\VDO@index')->with('success','บันทึกข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //search from id
        $vdo = MpscVdo::find($id);

        //delete
        $vdo->delete();

        return  redirect()->action('Admin\VDO@index')->with('success','บันทึกข้อมูลเรียบร้อย');
    }
}
