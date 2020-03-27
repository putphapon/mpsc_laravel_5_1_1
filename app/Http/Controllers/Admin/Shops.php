<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscShops; 

class Shops extends Controller
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
        $shops = MpscShops::all();
        
        return view('admin.shops-admin', ['shops' => $shops]);
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
        $shops = DB::table('mpsc_shops')->where('shops_name','like','%'.$search.'%')->get();
    
        return view('admin.shops-admin', ['shops' => $shops]);
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
                'nameShops' => 'required',
                'imageShops' => 'required',
                'linkShops' => 'required'
            ]
        );

        //create
        $shops = new MpscShops;
        $shops->shops_name = $request->nameShops;
        $shops->shops_link = $request->linkShops;

        //upload file
        if($request->hasFile('imageShops')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageShops')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageShops')->move($destination,$image_name);
            
            //add name to database field
            $shops->shops_image = $public_path.$image_name;
        }

        //save
        $shops->save();

        return  redirect()->action('Admin\Shops@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameShops' => 'required',
                'linkShops' => 'required'
            ]
        );

        //search from id
        $shops = MpscShops::find($id);
        $shops->shops_name = $request->nameShops;
        $shops->shops_link = $request->linkShops;

        //upload file
        if($request->hasFile('imageShops')){
            //delete file
            $destination = "";
            unlink($destination.$shops->shops_image);
            
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageShops')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageShops')->move($destination,$image_name);
            
            //add name to database field
            $shops->shops_image = $public_path.$image_name;
        }

        //save
        $shops->save();

        return  redirect()->action('Admin\Shops@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $shops = MpscShops::find($id);

        //delete file
        $destination = "";
        unlink($destination.$shops->shops_image);

        //delete
        $shops->delete();

        return  redirect()->action('Admin\Shops@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }
}
