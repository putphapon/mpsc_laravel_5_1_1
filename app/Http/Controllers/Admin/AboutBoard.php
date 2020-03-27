<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscAboutBoard;

class AboutBoard extends Controller
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
        $about_board = MpscAboutBoard::all();

        return view('admin.about-admin', ['about_board' => $about_board]);
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
        $about_board = DB::table('mpsc_about_board')->where('about_board_name','like','%'.$search.'%')->get();
    
        return view('admin.about-admin', ['about_board' => $about_board]);
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
                'nameAboutBoard' => 'required',
                'imageAboutBoard' => 'required'
            ]
        );

        //create
        $about_board = new MpscAboutBoard;
        $about_board->about_board_name = $request->nameAboutBoard;

        //upload file
        if($request->hasFile('imageAboutBoard')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageAboutBoard')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageAboutBoard')->move($destination,$image_name);
            
            //add name to database field
            $about_board->about_board_image = $public_path.$image_name;
        }

        //save
        $about_board->save();

        return  redirect()->action('Admin\About@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameAboutBoard' => 'required'
            ]
        );

         //search form id
         $about_board = MpscAboutBoard::find($id);

        //defind
         $about_board->about_board_name = $request->nameAboutBoard;

         //upload file
        if($request->hasFile('imageAboutBoard')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageAboutBoard')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageAboutBoard')->move($destination,$image_name);
            
            //add name to database field
            $about_board->about_board_image = $public_path.$image_name;
        }

        //save
        $about_board->save();

        return  redirect()->action('Admin\About@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $about_board = MpscAboutBoard::find($id);

        //delete file
        $destination = "";
        unlink($destination.$about_board->about_board_image);

        //delete
        $about_board->delete();
    }
}
