<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscTitle;

class Title extends Controller
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
        $title = MpscTitle::all();

        return view('admin.title-admin', ['title' => $title]);
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
        $title = DB::table('mpsc_titles')->where('title_name','like','%'.$search.'%')->get();
    
        return view('admin.title-admin', ['title' => $title]);
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
                'nameTitle' => 'required',
                'imageTitle' => 'required'
            ]
        );

        //insert
        $title = new MpscTitle;
        $title->title_name = $request->nameTitle;
        
        //upload file
        if($request->hasFile('imageTitle')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageTitle')->getClientOriginalName();
            
            //define Storage file
            $public_path = 'img/';
            //$destination = base_path()."/../public_html/".$public_path;
            $destination = base_path()."/../public_html/".$public_path;

            
            //save file
            $request->file('imageTitle')->move($destination,$image_name);
            
            //add name to database field
            $title->title_image = $public_path.$image_name;
        }

        //save
        $title->save();

        return  redirect()->action('Admin\Title@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameTitle' => 'required'
            ]
        );

        //search from id
        $title = MpscTitle::find($id);

        //define
        $title->title_name = $request->nameTitle;
        
        //upload file
        if($request->hasFile('imageTitle')){
            //delete file
            $destination = "";
            unlink($destination.$title->title_image);

            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageTitle')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageTitle')->move($destination,$image_name);
            
            //add name to database field
            $title->title_image = $public_path.$image_name;
        }

        //save
        $title->save();

        return  redirect()->action('Admin\Title@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $title = MpscTitle::find($id);

        //delete file
        $destination = "";
        unlink($destination.$title->title_image);

        //delete
        $title->delete();

        return  redirect()->action('Admin\Title@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }
}
