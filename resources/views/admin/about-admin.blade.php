@extends('layouts.layout-admin')

@section('title-bar', 'About')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">เกี่ยวกับ</h1>
        </div>
    </div>
    <br>
 
    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- tabs tabHead --}}
    <ul class="nav nav-tabs" id="tabHead" role="tablist">
        {{-- tab-1 --}}
        <li class="nav-item">
            <a class="nav-link {{ $true ? 'active' : '' }}" id="tab-1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="nav-1" aria-selected="{{ $true ? 'ture' : 'false' }}">วัตถุประสงค์</a>
        </li>

        {{-- tab-2 --}}
        <li class="nav-item">
            <a class="nav-link {{ !$true ? 'active' : '' }}" id="tab-2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="nav-1" aria-selected="{{ !$true ? 'ture' : 'false' }}">คณะกรรมการ</a>
        </li>        
    </ul>
    {{-- ------------------------------------------------------------------ --}}
    {{-- tabs tabsBody --}}
    <div class="tab-content" id="tabBody">
        {{-- tab-1 --}}
        <div class="tab-pane fade {{ $true ? 'active show' : '' }}" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">วัตถุประสงค์</h3>
                    </div>
                </div>
               
                {{-- form --}}
                <div class="d-flex">
                    {{-- add --}}
                    <div class="p-2 flex-shrink-0">
                        {{-- button --}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#admin-about-objective-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        {{-- Modal --}}
                        <div class="modal fade" id="admin-about-objective-form" tabindex="-1" role="dialog" aria-labelledby="admin-about-objective-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            {{-- form --}}
                                <form action="{{ action('Admin\AboutObjective@store') }}" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-about-objective-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
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

                                                    {{-- subject --}}
                                                    <div class="form-group">
                                                        <label for="subjectAboutObjective">หัวข้อ</label>
                                                        <input type="text" name="subjectAboutObjective" value="" class="form-control">
                                                    </div>
                                                    
                                                    {{-- detail --}}
                                                    <div class="form-group">
                                                        <label for="detailAboutObjective">รายละเอียด</label>
                                                        <textarea name="detailAboutObjective" value="" class="form-control WYSIWYGtextarea" row="10"></textarea>
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
                        <form action="{{ action('Admin\AboutObjective@search') }}" method="get">
                            <div class="input-group">
                                {{-- input --}}
                                <input type="search" name="search" value="" class="form-control">

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
                                    <th scope="col">หัวข้อ</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;?>
                                @foreach ($about_objective as $item)
                                <tr>
                                    {{-- No. --}}
                                    <th scope="row">{{ ++$i }}</th>
                                    {{-- subject --}}
                                    <td>{{ $item->about_objective_subject }}</td>
                                    {{-- detail --}}
                                    <td>
                                        <div class="overflow-auto p-3 mb-2" style="max-height: 150px;" >
                                            {!! $item->about_objective_detail !!}
                                        </div>
                                    </td>

                                    {{-- Edit --}}
                                    <td>
                                       <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-about-objective-form-edit-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-about-objective-form-edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="admin-about-objective-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ action('Admin\AboutObjective@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-about-objective-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
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

                                                                {{-- subject --}}
                                                                <div class="form-group">
                                                                    <label for="subjectAboutObjective">หัวข้อ</label>
                                                                    <input type="text" name="subjectAboutObjective" value="{{ $item->about_objective_subject }}" class="form-control">
                                                                </div>
                                                                
                                                                {{-- detail --}}
                                                                <div class="form-group">
                                                                    <label for="detailAboutObjective">รายละเอียด</label>
                                                                    <textarea name="detailAboutObjective" value="" class="form-control WYSIWYGtextarea" row="5">{{ $item->about_objective_detail }}</textarea>
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
                                        <form class="delete_form" action="{{ action('Admin\AboutObjective@destroy',$item->id) }}" method="post">
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
        <div class="tab-pane fade {{ !$true ? 'active show' : '' }}" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">
            <div class="container">
                {{-- title --}}
                <br>
                <div class="row">
                    <div class="col">
                        <h3 class="bg-secondary text-light rounded p-2">คณะกรรมการ</h3>
                    </div>
                </div>
            
                {{-- form --}}
                <div class="d-flex">
                    {{-- add --}}
                    <div class="p-2 flex-shrink-0">
                        {{-- button Insert --}}
                        <button class="btn btn-primary" data-toggle="modal" data-target="#admin-about-board-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
                        {{-- Modal Insert --}}
                        <div class="modal fade" id="admin-about-board-form" tabindex="-1" role="dialog" aria-labelledby="admin-about-board-form" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{-- form --}}
                                <form action="{{ action('Admin\AboutBoard@store') }}" method="post" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="admin-about-board-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
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

                                                    {{--name --}}
                                                    <div class="form-group">
                                                        <label for="nameAboutBoard">ชื่อ</label>
                                                        <input type="text" name="nameAboutBoard" value="" class="form-control">
                                                    </div>

                                                    {{-- image --}}
                                                    <div class="form-group">
                                                        <label for="imageAboutBoard">รูปภาพ</label>
                                                        <input type="file" class="form-control-file" name="imageAboutBoard" value="">
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
                        <form action="{{ action('Admin\AboutBoard@search') }}" method="get">
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
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">รูปภาพ</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;?>
                                @foreach ($about_board as $item) 
                                <tr>
                                    {{-- No. --}}
                                    <th scope="row">{{ ++$i }}</th>
                                    {{-- Name --}}
                                    <td>{{ $item->about_board_name }}</td>
                                    {{-- Image --}}
                                    <td>
                                        <img
                                        src="{{ asset($item->about_board_image) }}" 
                                        alt="{{ $item->about_board_name }}"
                                        class="rounded" style="height: 100px;">
                                    </td>
                                    {{-- Edit --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-about-board-form-edit-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="admin-about-board-form-edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="admin-about-board-form-edit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{-- form --}}
                                                <form class="edit_form" action="{{ action('Admin\AboutBoard@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="admin-about-board-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
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
                                                                    
                                                                    {{--name --}}
                                                                    <div class="form-group">
                                                                        <label for="nameAboutBoard">ชื่อ</label>
                                                                        <input type="text" name="nameAboutBoard" value="{{ $item->about_board_name }}" class="form-control">
                                                                    </div>

                                                                    {{-- image --}}
                                                                    <div class="form-group">
                                                                        <label for="imageAboutBoard">รูปภาพ :: {{ substr($item->about_board_image,4) }}</label>
                                                                        <input type="file" name="imageAboutBoard" value="" class="form-control-file">
                                                                        <img src="{{ asset($item->about_board_image) }}" alt="{{ $item->about_board_name }}" class="rounded p-2 " style="height: 100px;">
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
                                        <form class="delete_form" action="{{ action('Admin\AboutBoard@destroy',$item->id) }}" method="post">
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