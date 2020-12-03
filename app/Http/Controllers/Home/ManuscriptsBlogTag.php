<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MpscManuscriptsCategory;
use App\MpscManuscriptsBlog;

class ManuscriptsBlogTag extends Controller
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
        //

        $id = $request->search;
        
        if($id != '#') {
            $search = $id;
    
            $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')
                ->select('mpsc_manuscripts_blogs.id','manuscripts_blog_name','manuscripts_blog_detail','manuscripts_blog_image','mpsc_manuscripts_categories.manuscripts_category_name','manuscripts_blog_link','manuscripts_blog_tag')
                ->leftJoin('mpsc_manuscripts_categories', 'mpsc_manuscripts_blogs.manuscripts_category_id', '=', 'mpsc_manuscripts_categories.id')
                ->where('manuscripts_blog_name','like','%'.$search.'%')
                ->orWhere('manuscripts_blog_detail','like','%'.$search.'%')
                ->orWhere('manuscripts_blog_tag','like','%'.$search.'%')
                ->orWhere('manuscripts_category_name','like','%'.$search.'%')
                // ->orderBy('updated_at', 'desc')
                // ->paginate(2);
                ->get();
    
            $manuscripts_category = MpscManuscriptsCategory::all();
        } else {
            $manuscripts_blog = null;
        }

        $contact = DB::table('mpsc_contacts')->get();
        
        return view('home.manuscripts-blog-tag', 
            [
                'manuscripts_blog' => $manuscripts_blog,
                'manuscripts_category' => $manuscripts_category,
                'search' => $search,
                'contact' => $contact
            ]
        );
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
        if($id != '#') {
            $search = $id;
    
            $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')
                ->select('mpsc_manuscripts_blogs.id','manuscripts_blog_name','manuscripts_blog_detail','manuscripts_blog_image','mpsc_manuscripts_categories.manuscripts_category_name','manuscripts_blog_link','manuscripts_blog_tag')
                ->leftJoin('mpsc_manuscripts_categories', 'mpsc_manuscripts_blogs.manuscripts_category_id', '=', 'mpsc_manuscripts_categories.id')
                ->where('manuscripts_blog_name','like','%'.$search.'%')
                ->orWhere('manuscripts_blog_detail','like','%'.$search.'%')
                ->orWhere('manuscripts_blog_tag','like','%'.$search.'%')
                ->orWhere('manuscripts_category_name','like','%'.$search.'%')
                // ->orderBy('updated_at', 'desc')
                ->get();
    
            $manuscripts_category = MpscManuscriptsCategory::all();
        } else {
            $manuscripts_blog = null;
        }

        $contact = DB::table('mpsc_contacts')->get();

        return view('home.manuscripts-blog-tag', [
            'manuscripts_blog' => $manuscripts_blog,
            'manuscripts_category' => $manuscripts_category,
            'search' => $search,
            'contact' => $contact
        ]);
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
        //
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
