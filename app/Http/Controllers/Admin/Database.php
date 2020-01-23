<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MpscDatabase;
use Illuminate\Support\Facades\DB;

class Database extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select
        $database = MpscDatabase::all();

        return view('admin.database-admin', ['database' => $database]);
    }

    /**
     * Show the form for creating a new resource.
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
        $database = DB::table('mpsc_databases')->where('database_name','like','%'.$search.'%')->get();
    
        return view('admin.database-admin', ['database' => $database]);
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
                'nameDatabase' => 'required',
                'linkDatabase' => 'required',
                'imageDatabase' => 'required'
            ]
        );

        //create
        $database = new MpscDatabase;
        $database->database_name = $request->nameDatabase;
        $database->database_link = $request->linkDatabase;
        
        //upload file
        if($request->hasFile('imageDatabase')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageDatabase')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/public/".$public_path;

            //save file
            $request->file('imageDatabase')->move($destination,$image_name);
            
            //add name to database field
            $database->database_image = $public_path.$image_name;
        }
        
        //save
        $database->save();

        return  redirect()->action('Admin\Database@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameDatabase' => 'required',
                'linkDatabase' => 'required'
            ]
        );

        //search form id
        $database = MpscDatabase::find($id);

        //defind
        $database->database_name = $request->nameDatabase;
        $database->database_link = $request->linkDatabase;

        //uploal file
        if($request->hasFile('imageDatabase')){
            //delete file
            $destination = base_path()."/public/";
            unlink($destination.$database->database_image);

            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageDatabase')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/public/".$public_path;

            //save file
            $request->file('imageDatabase')->move($destination,$image_name);
            
            //add name to database field
            $database->database_image = $public_path.$image_name;
        }

        //save
        $database->save();

        return  redirect()->action('Admin\Database@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
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
        $database = MpscDatabase::find($id);

        //delete file
        $destination = base_path()."/public/";
        unlink($destination.$database->database_image);

        //delete
        $database->delete();

        return  redirect()->action('Admin\Database@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }
}
