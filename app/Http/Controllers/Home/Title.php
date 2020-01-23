<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\DB;

class Title extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = DB::table('mpsc_titles')->orderBy('created_at', 'desc')->get();
        $database = DB::table('mpsc_databases')->get();

        $scholar_category = DB::table('mpsc_scholar_categories')->get();
        $scholar_blog = DB::table('mpsc_scholar_blogs')->orderBy('created_at', 'desc')->get();
        
        $manuscripts_category = DB::table('mpsc_manuscripts_categories')->get();
        $manuscripts_blog = DB::table('mpsc_manuscripts_blogs')->orderBy('created_at', 'desc')->get();
        
        $vdo = DB::table('mpsc_vdos')->get();
        $events = DB::table('mpsc_events')->orderBy('events_date', 'desc')->get();
        $shops = DB::table('mpsc_shops')->orderBy('created_at', 'desc')->get();

        return view('home.home', 
            [   'title' => $title ,
                'database' => $database,
                'scholar_category' => $scholar_category,
                'scholar_blog' => $scholar_blog,
                'manuscripts_category' => $manuscripts_category,
                'manuscripts_blog' => $manuscripts_blog,
                'vdo' => $vdo,
                'events' => $events,
                'shops' => $shops
            ]
        );
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
