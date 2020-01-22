<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\MpscDatabase;
 
use App\Http\Controllers\Controller;

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
        $database = MpscDatabase::all()->get();

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

        //insert
        $database = new MpscDatabase;
        $database->database_name = $request->nameDatabase;
        $database->database_link = $request->linkDatabase;
        // $database->database_image = $request->file('imageDatabase');
        

        if($request->hasFile('imageDatabase')){
            $image_filename = $request->file('imageDatabase')->getClientOriginalName();
            $image_name = random_bytes(10).$image_filename;

            $destination = base_path()."/public/image/";

            $request->file('imageDatabase')->move($destination,$image_name);
            $database->database_image = $image_name;
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
        $data = MpscDatabase::find($id);

        $data->database_name = $request->nameDatabase;
        $data->database_link = $request->linkDatabase;

        //check image is null?
        if($request->imageDatabase != null) {
            //delete file
            Storage::delete($data['image_image']);

            //add file
            $data->database_image = $request->file('imageDatabase')->store('public/img');
        }

        //save
        $data->save();

        return  redirect()->route('database.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
