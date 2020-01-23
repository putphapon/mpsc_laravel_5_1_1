@extends('layouts.layout-admin')

@section('title-bar', 'Manuscripts')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">ธารความรู้</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- tabs tabHead --}}
    <ul class="nav nav-tabs" id="tabHead" role="tablist">
        {{-- tab-1 --}}
        <li class="nav-item">
            <a class="nav-link {{ $true ? 'active' : '' }}" id="tab-1-tab" data-toggle="tab" href="#tab-1" role="tab"  aria-controls="nav-1" aria-selected="{{ $true ? 'ture' : 'false' }}">บทความ</a>
        </li>

        {{-- tab-2 --}}
        <li class="nav-item">
            <a class="nav-link {{ !$true ? 'active' : '' }}" id="tab-2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="nav-2" aria-selected="{{ !$true ? 'ture' : 'false' }}">หมวด</a>
        </li>
    </ul>
    {{-- ------------------------------------------------------------------ --}}
    {{-- tabs tabsBody --}}
    <div class="tab-content" id="tabBody">
        {{-- tab-1 --}}
        <div class="tab-pane fade {{ $true ? 'show active' : '' }}" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">บทความ</h3>
                    </div>
                </div>
               
                {{-- nav controller --}}
                <div class="d-flex">
                    {{-- add --}}
                    <div class="p-2 flex-shrink-0">
                        {{-- button --}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#admin-manuscripts-blog-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        {{-- Modal --}}
                        <div class="modal fade" id="admin-manuscripts-blog-form" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-blog-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ action('Admin\ManuscriptsBlog@store') }}" method="post" enctype="multipart/form-data">
                                   
                                    {{-- POST --}}
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-manuscripts-blog-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- name --}}
                                                    <div class="form-group">
                                                        <label for="nameManuscriptsBlog">ชื่อบทความ</label>
                                                        <input type="text" name="nameManuscriptsBlog" value="" class="form-control">
                                                    </div>
                                                    
                                                    {{-- detail --}}
                                                    <div class="form-group">
                                                        <label for="detailManuscriptsBlog">คำเกริ่น</label>
                                                        <textarea name="detailManuscriptsBlog" value="" class="form-control" row="5"></textarea>
                                                    </div>

                                                    {{-- image --}}
                                                    <div class="form-group">
                                                        <label for="imageManuscriptsBlog">รูปภาพบทความ</label>
                                                        <input type="file" name="imageManuscriptsBlog" value="" class="form-control-file">
                                                    </div>

                                                    {{-- catagory --}}
                                                    <div class="form-group">
                                                        <label for="idManuscriptsCategory">หมวด</label>
                                                        <select class="custom-select" name="idManuscriptsCategory">
                                                                <option value="" selected>กรุณาเลือก</option>
                                                            @foreach ($manuscripts_category as $subitem)
                                                                <option value="{{ $subitem->id }}">{{ $subitem->manuscripts_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มหมวด ให้ไปที่แทบ 'หมวด'</small>
                                                    </div>

                                                    {{-- tag --}}
                                                    <div class="form-group">
                                                        <label for="tagManuscriptsBlog">แท๊ก</label>
                                                        <input type="text" name="tagManuscriptsBlog" value="" class="form-control">
                                                        <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>  
                                                    </div>

                                                    {{-- link --}}
                                                    <div class="form-group">
                                                        <label for="linkManuscriptsBlog">ลิงก์ดาวน์โหลดไฟล์</label>
                                                        <input type="text" name="linkManuscriptsBlog" value="" class="form-control">
                                                        <small class="form-text text-muted">ลิงก์แชร์ไฟล์ จาก Google Drive (*อย่าลืมเปิดแชร์ไฟล์ก่อนนำมากรอกลงฟอร์ม)</small>
                                                        <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" value="Submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>  บันทึก</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- search --}}
                    <div class="p-2 w-100">
                        <form action="{{ action('Admin\ManuscriptsBlog@search') }}" method="get">
                            <div class="input-group">
                                {{-- input --}}
                                <input type="text" name="search" value="" class="form-control">
                                
                                {{-- catagory --}}
                                <select class="custom-select" name="idManuscriptsCategory">
                                        <option value="" selected>กรุณาเลือก</option>
                                    @foreach ($manuscripts_category as $subitem)
                                        <option value="{{ $subitem->id }}">{{ $subitem->manuscripts_category_name }}</option>
                                    @endforeach
                                </select>
                                
                                {{-- submit --}}
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" value="Submit">ค้นหา</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                
                {{-- data --}}
                <div class="row">
                    <div class="col">
                        <table class="table table-sm table-hover">
                            <thead class="bg-info text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อบทความ</th>
                                    <th scope="col">คำเกริ่น</th>
                                    <th scope="col">รูปภาพบทความ</th>
                                    <th scope="col">หมวด</th>
                                    <th scope="col">แท๊ก</th>
                                    <th scope="col">ไฟล์</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;?>
                                @foreach ($manuscripts_blog as $item) 
                                <tr>
                                    {{-- No. --}}
                                    <th scope="row">{{ ++$i }}</th>
                                    {{-- Name --}}
                                    <td>{{ $item->manuscripts_blog_name }}</td>
                                    {{-- detail --}}
                                    <td>{{ $item->manuscripts_blog_detail }}</td>
                                    {{-- Image --}}
                                    <td>
                                        <img
                                        src="{{ asset($item->manuscripts_blog_image) }}" 
                                        alt="{{ $item->manuscripts_blog_name }}"
                                        class="rounded" style="height: 100px;">
                                    </td>
                                    
                                    {{-- Category --}}
                                    @foreach ($manuscripts_category as $subitem) 
                                        @if ($subitem->id == $item->manuscripts_category_id)
                                            <td>{{ $subitem->manuscripts_category_name }}</td>
                                        @endif
                                    @endforeach

                                    {{-- Tag --}}
                                    <td>{{ $item->manuscripts_blog_tag }}</td>

                                    {{-- Link --}}
                                    <td>
                                        @if($item->manuscripts_blog_link != "#")
                                            <a href="{{$item->manuscripts_blog_link}}" target="blank"><span class="badge badge-pill badge-success"><i class="fa fa-check p-1" aria-hidden="true"></i></a></span>
                                        @else
                                            <span class="badge badge-pill badge-danger"><i class="fa fa-close p-1" aria-hidden="true"></i></span>
                                        @endif
                                    </td>

                                    {{-- Edit --}}
                                    <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-manuscripts-blog-form-edit-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-manuscripts-blog-form-edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-blog-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ action('Admin\ManuscriptsBlog@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-manuscripts-blog-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    {{-- PUT --}}
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                    {{-- name --}}
                                                                    <div class="form-group">
                                                                        <label for="nameManuscriptsBlog">ชื่อบทความ</label>
                                                                        <input type="text" name="nameManuscriptsBlog" value="{{ $item->manuscripts_blog_name }}" class="form-control">
                                                                    </div>
            
                                                                    {{-- detail --}}
                                                                    <div class="form-group">
                                                                        <label for="detailManuscriptsBlog">คำเกริ่น</label>
                                                                        <textarea name="detailManuscriptsBlog" value="" class="form-control" row="5">{{ $item->manuscripts_blog_detail }}</textarea>
                                                                    </div>

                                                                    {{-- image --}}
                                                                    <div class="form-group">
                                                                        <label for="imageManuscriptsBlog">รูปภาพบทความ :: {{ substr($item->manuscripts_blog_image,4) }}</label>
                                                                        <input type="file" name="imageManuscriptsBlog" value="" class="form-control-file">
                                                                        <img src="{{ asset($item->manuscripts_blog_image) }}" alt="{{ $item->manuscripts_blog_name }}" class="p-2 rounded" style="height: 100px;">
                                                                    </div> 
                                                                    
                                                                    {{-- category --}}
                                                                    <div class="form-group">
                                                                        <label for="idManuscriptsCategory">หมวด</label>
                                                                        <select class="custom-select" name="idManuscriptsCategory">
                                                                            <option selected>เลือกหมวด</option>
                                                                            @foreach ($manuscripts_category as $subitem)
                                                                                @if ($subitem->id == $item->manuscripts_category_id)
                                                                                    <option value="{{ $subitem->id }}" selected>{{ $subitem->manuscripts_category_name }}</option>
                                                                                @else
                                                                                    <option value="{{ $subitem->id }}">{{ $subitem->manuscripts_category_name }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มหมวด ให้ไปที่แทบ 'หมวด'</small>
                                                                    </div>

                                                                    {{-- tag --}}
                                                                    <div class="form-group">
                                                                        <label for="tagManuscriptsBlog">แท๊ก</label>
                                                                        <input type="text" name="tagManuscriptsBlog" value="{{ $item->manuscripts_blog_tag  }}" class="form-control">
                                                                        <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>  
                                                                    </div>

                                                                    {{-- link --}}
                                                                    <div class="form-group">
                                                                        <label for="linkManuscriptsBlog">ลิงก์ดาวน์โหลดไฟล์</label>
                                                                        <input type="text" name="linkManuscriptsBlog" value="{{ $item->manuscripts_blog_link }}" class="form-control">
                                                                        <small class="form-text text-muted">ลิงก์แชร์ไฟล์ จาก Google Drive (*อย่าลืมเปิดแชร์ไฟล์ก่อนนำมากรอกลงฟอร์ม)</small>
                                                                        <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" value="Submit" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Delete --}}
                                    <td>
                                        <form class="delete_form" action="{{ action('Admin\ManuscriptsBlog@destroy',$item->id) }}" method="post">
                                            {{-- DELETE --}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <button class="btn btn-danger btn-sm" type="submit" value="Submit"><i class="fa fa-trash-o" aria-hidden="true"></i>  ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
                {{-- page nav --}}
                {{-- <div class="row">
                    <div class="col">
                        <div aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><<</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">>></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- tab-2 --}}
        <div class="tab-pane fade {{ !$true ? 'show active' : '' }}" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">หมวด</h3>
                    </div>
                </div>
            
                {{-- nav controller --}}
                <div class="d-flex">
                    {{-- add --}}
                    <div class="p-2 flex-shrink-0">
                        {{-- button --}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#admin-manuscripts-category-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        {{-- Modal --}}
                        <div class="modal fade" id="admin-manuscripts-category-form" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-category-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ action('Admin\ManuscriptsCategory@store') }}" method="post" enctype="multipart/form-data">
                                    
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-manuscripts-category-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                                
                                                    {{-- POST --}}
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    {{-- name --}}
                                                    <div class="form-group">
                                                        <label for="nameManuscriptsCategory">ชื่อหมวด</label>
                                                        <input type="text" name="nameManuscriptsCategory" value="" class="form-control">
                                                    </div>
                                                    
                                                    {{-- detail --}}
                                                    <div class="form-group">
                                                        <label for="detailManuscriptsCategory">คำเกริ่น</label>
                                                        <textarea name="detailManuscriptsCategory" value="" class="form-control" row="5"></textarea>
                                                    </div>
                                                    
                                                    {{-- image --}}
                                                    <div class="form-group">
                                                        <label for="imageManuscriptsCategory">รูปภาพหมวด</label>
                                                        <input type="file" name="imageManuscriptsCategory" value="" class="form-control-file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" value="Submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>  บันทึก</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- search --}}
                    <div class="p-2 w-100">
                        <form action="{{ action('Admin\ManuscriptsCategory@search') }}" method="get">
                            <div class="input-group">
                                {{-- input --}}
                                <input type="text" name="search" value="" class="form-control">
                                
                                {{-- submit --}}
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" value="Submit">ค้นหา</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                
                {{-- data --}}
                <div class="row">
                    <div class="col">
                        <table class="table table-sm table-hover">
                            <thead class="bg-info text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อหมวด</th>
                                    <th scope="col">คำเกริ่น</th>
                                    <th scope="col">รูปภาพหมวด</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;?>
                                @foreach ($manuscripts_category as $item) 
                                <tr>
                                    {{-- No. --}}
                                    <th scope="row">{{ ++$i }}</th>
                                    {{-- Name --}}
                                    <td>{{ $item->manuscripts_category_name }}</td>
                                    {{-- detail --}}
                                    <td>{{ $item->manuscripts_category_detail }}</td>
                                    {{-- Image --}}
                                    <td>
                                        <img
                                        src="{{ asset($item->manuscripts_category_image) }}" 
                                        alt="{{ $item->manuscripts_category_name }}"
                                        class="rounded" style="height: 100px;">
                                    </td>
                                    {{-- Edit --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-manuscripts-category-form-edit-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-manuscripts-category-form-edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="admin-manuscripts-category-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ action('Admin\ManuscriptsCategory@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-manuscripts-category-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    {{-- PUT --}}
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
                                                                    {{-- name --}}
                                                                    <div class="form-group">
                                                                        <label for="nameManuscriptsCategory">ชื่อหมวด</label>
                                                                        <input type="text" name="nameManuscriptsCategory" value="{{ $item->manuscripts_category_name }}" class="form-control">
                                                                    </div>
                                                                    
                                                                    {{-- detail --}}
                                                                    <div class="form-group">
                                                                        <label for="detailManuscriptsCategory">คำเกริ่น</label>
                                                                        <textarea name="detailManuscriptsCategory" value="" class="form-control" row="5">{{ $item->manuscripts_category_detail }}</textarea>
                                                                    </div>
                                                                    
                                                                    {{-- image --}}
                                                                    <div class="form-group">
                                                                        <label for="imageManuscriptsCategory">รูปภาพหมวด :: {{ substr($item->manuscripts_category_image,4) }}</label>
                                                                        <input type="file" name="imageManuscriptsCategory" value="" class="form-control-file">
                                                                        <img src="{{ asset($item->manuscripts_category_image) }}" alt="{{ $item->manuscripts_category_name }}" class="p-2 rounded" style="height: 100px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" value="Submit" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i>  ปิด</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Delete --}}
                                    <td>
                                        <form class="delete_form" action="{{ action('Admin\ManuscriptsCategory@destroy',$item->id) }}" method="post">
                                            {{-- DELETE --}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <button class="btn btn-danger btn-sm" type="submit" value="Submit"><i class="fa fa-trash-o" aria-hidden="true"></i>  ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
                {{-- page nav --}}
                {{-- <div class="row">
                    <div class="col">
                        <div aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><<</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">>></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

</div>
@endsection