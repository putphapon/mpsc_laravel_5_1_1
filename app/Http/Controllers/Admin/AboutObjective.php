<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscAboutObjective;

class AboutObjective extends Controller
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
        $about_objective = MpscAboutObjective::all();

        return view('admin.about-admin', ['about_objective' => $about_objective]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request = null)
    {
        //search
        $search = $request->search;
        $about_objective = DB::table('mpsc_about_objective')->where('about_objective_subject','like','%'.$search.'%')->get();
    
        return view('admin.about-admin', ['about_objective' => $about_objective]);
    }


    public function create()
    {
        //
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
                'subjectAboutObjective' => 'required',
                'detailAboutObjective' => 'required'
            ]
        );

        //create
        $about_objective = new MpscAboutObjective;
        $about_objective->about_objective_subject = $request->subjectAboutObjective;
        $about_objective->about_objective_detail = $request->detailAboutObjective;

        //save
        $about_objective->save();

        return  redirect()->action('Admin\About@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
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
     * Show the form for editing the specified resource.
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
                'subjectAboutObjective' => 'required',
                'detailAboutObjective' => 'required'
            ]
        );

        //search form id
        $about_objective = MpscAboutObjective::find($id);

        //defind
        $about_objective->about_objective_subject = $request->subjectAboutObjective;
        $about_objective->aabout_objective_detail = $request->detailAboutObjective;
        
        //save
        $about_objective->save();

        return redirect()->action('Admin\About@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //search form id
        $about_objective = MpscAboutObjective::find($id);

        //delete
        $about_objective->delete();

        return redirect()->action('Admin\About@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
}
}
