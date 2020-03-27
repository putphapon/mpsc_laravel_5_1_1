<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscManuscriptsCategory;
use App\MpscManuscriptsBlog;

class ManuscriptsBlog extends Controller
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
        $category =  $request->idManuscriptsCategory;

        if ($search == null && $category == null) {
            $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else if ( $search == null )
        {
            $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')
                ->where('manuscripts_category_id',$category)
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else if( $category == null)
        {
            $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')
                ->where('manuscripts_blog_name','like','%'.$search.'%')
                ->orWhere('manuscripts_blog_detail','like','%'.$search.'%')
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else
        {
            $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')
                ->where('manuscripts_blog_name','like','%'.$search.'%')
                ->orWhere('manuscripts_blog_detail','like','%'.$search.'%')
                ->where('manuscripts_category_id',$category)
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        $manuscripts_category = MpscManuscriptsCategory::all();
        $true = 'true';
        
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
                'nameManuscriptsBlog' => 'required',
                'detailManuscriptsBlog' => 'required',
                'imageManuscriptsBlog' => 'required',
                'idManuscriptsCategory' => 'required',
                'tagManuscriptsBlog' => 'required',
                'linkManuscriptsBlog' => 'required'
            ]
        );
 
        //create
        $manuscripts_blog = new MpscManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_name = $request->nameManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_detail = $request->detailManuscriptsBlog;
        $manuscripts_blog->manuscripts_category_id = $request->idManuscriptsCategory;
        $manuscripts_blog->manuscripts_blog_reference = $request->referenceManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_tag = $request->tagManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_link = $request->linkManuscriptsBlog;

        //upload file
        if($request->hasFile('imageManuscriptsBlog')){
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageManuscriptsBlog')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageManuscriptsBlog')->move($destination,$image_name);
            
            //add name to database field
            $manuscripts_blog->manuscripts_blog_image = $public_path.$image_name;
        }

        //save
        $manuscripts_blog->save();

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
                'nameManuscriptsBlog' => 'required',
                'detailManuscriptsBlog' => 'required',
                'idManuscriptsCategory' => 'required',
                'tagManuscriptsBlog' => 'required',
                'linkManuscriptsBlog' => 'required'
            ]
        );
 
        //search from id
        $manuscripts_blog = MpscManuscriptsBlog::find($id);

        //defind
        $manuscripts_blog->manuscripts_blog_name = $request->nameManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_detail = $request->detailManuscriptsBlog;
        $manuscripts_blog->manuscripts_category_id = $request->idManuscriptsCategory;
        $manuscripts_blog->manuscripts_blog_reference = $request->referenceManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_tag = $request->tagManuscriptsBlog;
        $manuscripts_blog->manuscripts_blog_link = $request->linkManuscriptsBlog;

        //upload file
        if($request->hasFile('imageManuscriptsBlog')){
            //delete file
            $destination = "";
            unlink($destination.$manuscripts_blog->manuscripts_blog_image);
            
            //define Name file
            $image_name = date('Ymd-His-').$request->file('imageManuscriptsBlog')->getClientOriginalName();

            //define Storage file
            $public_path = 'img/';
            $destination = base_path()."/../public_html/".$public_path;

            //save file
            $request->file('imageManuscriptsBlog')->move($destination,$image_name);
            
            //add name to database field
            $manuscripts_blog->manuscripts_blog_image = $public_path.$image_name;
        }

        //save
        $manuscripts_blog->save();

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
        $manuscripts_blog = MpscManuscriptsBlog::find($id);

        //delete file
        $destination = "";
        unlink($destination.$manuscripts_blog->manuscripts_blog_image);

        //delete
        $manuscripts_blog->delete();

        return  redirect()->action('Admin\Manuscripts@index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }
}
