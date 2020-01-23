<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscScholarBlog;
use App\MpscScholarCategory;

class ScholarCategory extends Controller
{
    
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

        if($search != null) {
            $scholar_category = DB::table('mpsc_scholar_categories')
                        ->where('scholar_category_name','like','%'.$search.'%')
                        ->orderBy('updated_at', 'desc')
                        ->get();
        } else {
            $scholar_category = DB::table('mpsc_scholar_categories')
                        ->orderBy('updated_at', 'desc')
                        ->get();
        }
        
        $scholar_blog = MpscScholarBlog::all();
        $true = '';

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
                'nameScholarCategory' => 'required',
             ]
        );
        
        //create
        $scholar_category = new MpscScholarCategory;
        $scholar_category->scholar_category_name = $request->nameScholarCategory;
        
        //save
        $scholar_category->save();

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
                'nameScholarCategory' => 'required',
             ]
        );
        
        //search from id
        $scholar_category = MpscScholarCategory::find($id);

        //define
        $scholar_category->scholar_category_name = $request->nameScholarCategory;
        
        //save
        $scholar_category->save();

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
        $scholar_category = MpscScholarCategory::find($id);
        
        //delete
        $scholar_category->delete();

        return  redirect()->action('Admin\Scholar@index')->with('success','บันทึกข้อมูลเรียบร้อย');
    }
}
