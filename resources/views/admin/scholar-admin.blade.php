@extends('layouts.layout-admin')

@section('title-bar', 'Scholar')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">บทความวิชาการ/งานวิจัย</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- tabs tabHead --}}    
    <ul class="nav nav-tabs" id="tabHead" role="tablist">
        {{-- tab-1 --}}
        <li class="nav-item">
            <a class="nav-link active" id="tab-1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">บทความ</a>
        </li>

        {{-- tab-2 --}}
        <li class="nav-item">
            <a class="nav-link" id="tab-2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">หมวด</a>
        </li>        
    </ul>
    {{-- ------------------------------------------------------------------ --}}
    {{-- tabs tabsBody --}}
    <div class="tab-content" id="tabBody">
        {{-- tab-1 --}}
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">บทความ</h3>
                    </div>
                </div>
               
                {{-- form --}}
                <div class="row">
                    <div class="col">
                        {{-- Modal Insert --}}
                        <div class="modal fade" id="admin-scholar-blog-form" tabindex="-1" role="dialog" aria-labelledby="admin-scholar-blog-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ action('AdminScholarBlog@store') }}" method="post" enctype="multipart/form-data">
                                    @csrf @method('POST')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-scholar-blog-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- name --}}
                                                    <div class="form-group">
                                                        <label for="nameScholarBlog">ชื่อบทความ</label>
                                                        <input type="text" name="nameScholarBlog" value="" class="form-control">
                                                    </div>
                                                    
                                                    {{-- author --}}
                                                    <div class="form-group">
                                                        <label for="authorScholarBlog">ผู้แต่ง</label>
                                                        <input type="text" name="authorScholarBlog" value="" class="form-control">
                                                    </div>

                                                    {{-- catagory --}}
                                                    <div class="form-group">
                                                        <label for="idScholarCategory">หมวด</label>
                                                        <select class="custom-select" name="idScholarCategory">
                                                                <option value="" selected>กรุณาเลือก</option>
                                                            @foreach ($dataScholarCategory as $subitem)
                                                                <option value="{{$subitem['id']}}">{{ $subitem['scholar_category_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="form-text text-muted">ถ้าต้องการเพิ่มหมวด ให้ไปที่แทบ 'หมวด'</small>
                                                    </div>

                                                    {{-- link --}}
                                                    <div class="form-group">
                                                        <label for="linkScholarBlog">ลิงก์ดาวน์โหลดไฟล์</label>
                                                        <input type="text" name="linkScholarBlog" value="" class="form-control">                                    
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
                        
                        {{-- button Insert --}}
                        <div class="row float-right mr-1">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-scholar-blog-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        </div>
                        
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
                                    <th scope="col">ผู้แต่ง</th>
                                    <th scope="col">หมวด</th>
                                    <th scope="col">ไฟล์</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataScholarBlog as $item) 
                                <tr>
                                    {{-- No. --}}
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    {{-- Name --}}
                                    <td>{{ $item['scholar_blog_name'] }}</td>
                                    {{-- Author --}}
                                    <td>{{ $item['scholar_blog_author'] }}</td>

                                    {{-- Category --}}
                                    @foreach ($dataScholarCategory as $subitem) 
                                        @if ($subitem['id'] == $item['scholar_category_id'])
                                            <td>{{ $subitem['scholar_category_name'] }}</td>
                                        @endif
                                    @endforeach

                                    {{-- Link --}}
                                    <td>
                                        @if($item['scholar_blog_link'] != "#")
                                            <a href="{{$item['scholar_blog_link']}}" target="blank"><span class="badge badge-pill badge-success"><i class="fa fa-check p-1" aria-hidden="true"></i></a></span>
                                        @else
                                            <span class="badge badge-pill badge-danger"><i class="fa fa-close p-1" aria-hidden="true"></i></span>
                                        @endif
                                    </td>

                                    {{-- Edit --}}
                                    <td>
                                       <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-scholar-blog-form-edit-{{$item['id']}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-scholar-blog-form-edit-{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="admin-scholar-blog-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ action('AdminScholarBlog@update',$item['id']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-scholar-blog-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                {{-- name --}}
                                                                <div class="form-group">
                                                                    <label for="nameScholarBlog">ชื่อบทความ</label>
                                                                    <input type="text" name="nameScholarBlog" value="{{ $item['scholar_blog_name'] }}" class="form-control">
                                                                </div>
                                                                
                                                                {{-- author --}}
                                                                <div class="form-group">
                                                                    <label for="authorScholarBlog">ผู้แต่ง</label>
                                                                    <input type="text" name="authorScholarBlog" value="{{ $item['scholar_blog_author'] }}" class="form-control">
                                                                </div>
                                                                    
                                                                {{-- category --}}
                                                                <div class="form-group">
                                                                    <label for="idScholarCategory">หมวด</label>
                                                                    <select class="custom-select" name="idScholarCategory">
                                                                        <option selected>เลือกหมวด</option>
                                                                        @foreach ($dataScholarCategory as $subitem)
                                                                            @if ($subitem['id'] == $item['scholar_category_id'])
                                                                                <option value="{{ $subitem['id'] }}" selected>{{ $subitem['scholar_category_name'] }}</option>
                                                                            @else
                                                                                <option value="{{ $subitem['id'] }}">{{ $subitem['scholar_category_name'] }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <small class="form-text text-muted">ถ้าต้องการเพิ่มหมวด ให้ไปที่แทบ 'หมวด'</small>
                                                                </div>

                                                                {{-- link --}}
                                                                <div class="form-group">
                                                                    <label for="linkScholarBlog">ลิงก์ดาวน์โหลดไฟล์</label>
                                                                    <input type="text" name="linkScholarBlog" value="{{ $item['scholar_blog_link'] }}" class="form-control">
                                                                    <small class="form-text text-muted">ลิงก์แชร์ไฟล์ จาก Google Drive (*อย่าลืมเปิดแชร์ไฟล์ก่อนนำมากรอกลงฟอร์ม)</small>
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
                                        <form class="delete_form" action="{{ action('AdminScholarBlog@destroy',$item['id']) }}" method="post">
                                            @csrf @method('DELETE')
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
        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">หมวด</h3>
                    </div>
                </div>
            
                {{-- form --}}
                <div class="row">
                    <div class="col">
                        {{-- Modal Insert --}}
                        <div class="modal fade" id="admin-scholar-category-form" tabindex="-1" role="dialog" aria-labelledby="admin-scholar-category-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ action('AdminScholarCategory@store') }}" method="post" enctype="multipart/form-data">
                                    @csrf @method('POST')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-scholar-category-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- name --}}
                                                    <div class="form-group">
                                                        <label for="nameScholarCategory">ชื่อหมวด</label>
                                                        <input type="text" name="nameScholarCategory" value="" class="form-control">
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
                        
                        {{-- button Insert --}}
                        <div class="row float-right mr-1">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-scholar-category-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        </div>
                        
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
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataScholarCategory as $item) 
                                <tr>
                                    {{-- No. --}}
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    {{-- Name --}}
                                    <td>{{ $item['scholar_category_name'] }}</td>
                                    {{-- Edit --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-scholar-category-form-edit-{{$item['id']}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-scholar-category-form-edit-{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="admin-scholar-category-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ action('AdminScholarCategory@update',$item['id']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-scholar-category-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    {{-- name --}}
                                                                    <div class="form-group">
                                                                        <label for="nameScholarCategory">ชื่อหมวด</label>
                                                                        <input type="text" name="nameScholarCategory" value="{{ $item['scholar_category_name'] }}" class="form-control">
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
                                        <form class="delete_form" action="{{ action('AdminScholarCategory@destroy',$item['id']) }}" method="post">
                                            @csrf @method('DELETE')
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