<?php

namespace App\Http\Controllers\ADmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscEvents;

class Events extends Controller
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
        $events = MpscEvents::all();

        return view('admin.events-admin', ['events' => $events]);
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
        $events = DB::table('mpsc_events')->where('events_name','like','%'.$search.'%')->get();
    
        return view('admin.events-admin', ['events' => $events]);
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
                'nameEvents' => 'required',
                'imageEvents' => 'required',
                'dateEvents' => 'required',
                'whereEvents' => 'required',
                'linkRegEvents' => 'required',
                'linkImageEvents' => 'required'
            ]
        );

        //create
        $events = new MpscEvents;
        $events->events_name = $request->nameEvents;
        $events->events_date = $request->dateEvents;
        $events->events_where = $request->whereEvents;
        $events->events_linkReg = $request->linkRegEvents;
        $events->events_linkImage = $request->linkImageEvents;

        //upload file
        if($request->hasFile('imageEvents')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageEvents')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/public/".$public_path;

            //save file
            $request->file('imageEvents')->move($destination,$image_name);
            
            //add name to database field
            $events->events_image = $public_path.$image_name;
        }

        //save
        $events->save();

        return  redirect()->action('Admin\Events@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameEvents' => 'required',
                'dateEvents' => 'required',
                'whereEvents' => 'required',
                'linkRegEvents' => 'required',
                'linkImageEvents' => 'required'
            ]
        );

        //search form id
        $events = MpscEvents::find($id);

        //defind
        $events->events_name = $request->nameEvents;
        $events->events_date = $request->dateEvents;
        $events->events_where = $request->whereEvents;
        $events->events_linkReg = $request->linkRegEvents;
        $events->events_linkImage = $request->linkImageEvents;
        
        //upload file
        if($request->hasFile('imageEvents')){
            //delete file
            $destination = base_path()."/public/";
            unlink($destination.$events->events_image);
            
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageEvents')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/public/".$public_path;

            //save file
            $request->file('imageEvents')->move($destination,$image_name);
            
            //add name to database field
            $events->events_image = $public_path.$image_name;
        }

        //save
        $events->save();

        return  redirect()->action('Admin\Events@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
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
        $events = MpscEvents::find($id);
        
        //delete file
        $destination = base_path()."/public/";
        unlink($destination.$events->events_image);

        //delete
        $events->delete();

        return redirect()->action('Admin\Events@index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
