<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscScholarBlog;
use App\MpscScholarCategory;

class ScholarBlog extends Controller
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
        $category =  $request->idScholarCategory;

        if ($search == null && $category == null) {
            $scholar_blog = DB::table('mpsc_scholar_blogs')
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else if ( $search == null )
        {
            $scholar_blog = DB::table('mpsc_scholar_blogs')
                ->where('scholar_category_id',$category)
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else if( $category == null)
        {
            $scholar_blog = DB::table('mpsc_scholar_blogs')
                ->where('scholar_blog_name','like','%'.$search.'%')
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else
        {
            $scholar_blog = DB::table('mpsc_scholar_blogs')
                ->where('scholar_blog_name','like','%'.$search.'%')
                ->where('scholar_category_id',$category)
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        $scholar_category = MpscScholarCategory::all();
        $true = 'true';
        
        return view('admin.scholar-admin', [
            'scholar_blog' => $scholar_blog,
            'scholar_category' => $scholar_category,
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
                'nameScholarBlog' => 'required',
                'authorScholarBlog' => 'required',
                'idScholarCategory' => 'required',
                'linkScholarBlog' => 'required'
            ]
        );

        //create
        $scholar_blog = new MpscScholarBlog;
        $scholar_blog->scholar_blog_name = $request->nameScholarBlog;
        $scholar_blog->scholar_blog_author = $request->authorScholarBlog;
        $scholar_blog->scholar_category_id = $request->idScholarCategory;
        $scholar_blog->scholar_blog_link = $request->linkScholarBlog;
    
        //save
        $scholar_blog->save();

        return  redirect()->action('Admin\Scholar@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
                'nameScholarBlog' => 'required',
                'authorScholarBlog' => 'required',
                'idScholarCategory' => 'required',
                'linkScholarBlog' => 'required'
            ]
        );

        //search from id
        $scholar_blog = MpscScholarBlog::find($id);

        //define
        $scholar_blog->scholar_blog_name = $request->nameScholarBlog;
        $scholar_blog->scholar_blog_author = $request->authorScholarBlog;
        $scholar_blog->scholar_category_id = $request->idScholarCategory;
        $scholar_blog->scholar_blog_link = $request->linkScholarBlog;
        
        //save
        $scholar_blog->save();

        return  redirect()->action('Admin\Scholar@index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $scholar_blog = MpscScholarBlog::find($id);
        
        //delete
        $scholar_blog->delete();
        
        return  redirect()->action('Admin\Scholar@index')->with('success','บันทึกข้อมูลเรียบร้อย');
    }
}
