<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscManuscriptsCategory;
use App\MpscManuscriptsBlog;

class ManuscriptsCategory extends Controller
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
        //
        return route('manuscripts.index');
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

        if($search != null) {
            $manuscripts_category = DB::table('mpsc_manuscripts_categories')
                        ->where('manuscripts_category_name','like','%'.$search.'%')
                        ->orderBy('updated_at', 'desc')
                        ->get();
        } else {
            $manuscripts_category = DB::table('mpsc_manuscripts_categories')
                        ->orderBy('updated_at', 'desc')
                        ->get();
        }
        
        $manuscripts_blog = MpscManuscriptsBlog::all();
        $true = '';

        return view('admin.manuscripts-admin', [
            'manuscripts_blog' => $manuscripts_blog,
            'manuscripts_category' => $manuscripts_category,
             'true' => $true
            ]);
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
                'nameManuscriptsCategory' => 'required',
                'detailManuscriptsCategory' => 'required',
                'imageManuscriptsCategory' => 'required'
            ]
        ); 

        //create
        $manuscripts_category = new MpscManuscriptsCategory;
        $manuscripts_category->manuscripts_category_name = $request->nameManuscriptsCategory;
        $manuscripts_category->manuscripts_category_detail = $request->detailManuscriptsCategory;
        
        //upload file
        if($request->hasFile('imageManuscriptsCategory')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageManuscriptsCategory')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageManuscriptsCategory')->move($destination,$image_name);
            
            //add name to database field
            $manuscripts_category->manuscripts_category_image = $public_path.$image_name;
        }

        //save
        $manuscripts_category->save();

        return  redirect()->action('Admin\Manuscripts@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameManuscriptsCategory' => 'required',
                'detailManuscriptsCategory' => 'required'
            ]
        ); 

        //search from id
        $manuscripts_category = MpscManuscriptsCategory::find($id);

        //define
        $manuscripts_category->manuscripts_category_name = $request->nameManuscriptsCategory;
        $manuscripts_category->manuscripts_category_detail = $request->detailManuscriptsCategory;
        
        //upload file
        if($request->hasFile('imageManuscriptsCategory')){
            //delete file
            $destination = "";
            unlink($destination.$manuscripts_category->manuscripts_category_image);
            
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageManuscriptsCategory')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageManuscriptsCategory')->move($destination,$image_name);
            
            //add name to database field
            $manuscripts_category->manuscripts_category_image = $public_path.$image_name;
        }

        //save
        $manuscripts_category->save();

        return  redirect()->action('Admin\Manuscripts@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $manuscripts_category = MpscManuscriptsCategory::find($id);
        
        //delete file
        $destination = "";
        unlink($destination.$manuscripts_category->manuscripts_category_image);
        
        //delete
        $manuscripts_category->delete();
        
        return  redirect()->action('Admin\Manuscripts@index')->with('success','บันทึกข้อมูลเรียบร้อย');
    }
}
