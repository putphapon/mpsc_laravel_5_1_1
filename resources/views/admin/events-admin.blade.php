@extends('layouts.layout-admin')

@section('title-bar', 'Events')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">กิจกรรม</h1>
        </div>
    </div>
    <br> 

    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- nav controller --}}
    <div class="d-flex">
        {{-- add --}}
        <div class="p-2 flex-shrink-0">
            {{-- button --}}
            <button class="btn btn-primary" data-toggle="modal" data-target="#admin-events-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
            {{-- Modal --}}
            <div class="modal fade" id="admin-events-form" tabindex="-1" role="dialog" aria-labelledby="admin-events-form" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    {{-- form --}}
                    <form action="{{ action('Admin\Events@store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="admin-events-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
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
                                            <label for="nameEvents">ชื่อกิจกรรม</label>
                                            <input type="text" name="nameEvents" value="" class="form-control">
                                        </div>

                                        {{-- image --}}
                                        <div class="form-group">
                                            <label for="imageEvents">รูปภาพ</label> 
                                            <input type="file" class="form-control-file"  name="imageEvents" value="">
                                        </div>
                                        
                                        {{-- Date --}}
                                        <div class="form-group">
                                            <label for="dateEvents">วันที่</label>
                                            <input type="date" name="dateEvents" value="" class="form-control">
                                        </div>

                                        {{-- Where --}}
                                        <div class="form-group">
                                            <label for="whereEvents">สถานที่</label>
                                            <input type="text" name="whereEvents" value="" class="form-control">
                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                        </div>

                                        {{-- Register --}}
                                        <div class="form-group">
                                            <label for="linkRegEvents">link ลงทะเบียน</label>
                                            <input type="text" name="linkRegEvents" value="" class="form-control">
                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                        </div>

                                        {{-- link image Google Drive --}}
                                        <div class="form-group">
                                            <label for="linkImageEvents">link แฟ้มรูปภาพ</label>
                                            <input type="text" name="linkImageEvents" value="" class="form-control">
                                            <small class="form-text text-muted">ลิงก์แชร์แฟ้มรูปภาพ จาก Google Drive (*อย่าลืมเปิดแชร์แฟ้มก่อนนำมากรอกลงฟอร์ม)</small> 
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
            <form action="{{ action('Admin\Events@search') }}" method="get">
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
                        <th scope="col">ชื่อกิจกรรม</th>
                        <th scope="col">รูปภาพ</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">สถานที่</th>
                        <th scope="col">link ลงทะเบียน</th>
                        <th scope="col">link รูปภาพ</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($events as $item)
                    <tr>
                        {{-- No. --}}
                        <th scope="row">{{ ++$i }}</th>
                        {{-- Name --}}
                        <td>{{ $item->events_name }}</td>
                        {{-- Image --}}
                        <td>
                            <img 
                            src="{{ asset($item->events_image)}}"
                            alt="{{ $item->events_name }}"
                            class="rounded" style="height: 100px;">
                        </td>
                        {{-- Date --}}
                        <td>{{ $item->events_date }}</td>
                        {{-- Where --}}
                        <td>{{ $item->events_where }}</td>
                        {{-- Register --}}
                        <td>
                            @if($item->events_linkReg != "#")
                                <a href="{{$item->events_linkReg}}" target="blank"><span class="badge badge-pill badge-success"><i class="fa fa-check p-1" aria-hidden="true"></i></a></span>
                            @else
                                <span class="badge badge-pill badge-danger"><i class="fa fa-close p-1" aria-hidden="true"></i></span>
                            @endif
                        </td>

                        {{-- link image Google Drive --}}
                        <td>
                            @if($item->events_linkImage != "#")
                                <a href="{{$item->events_linkImage}}" target="blank"><span class="badge badge-pill badge-success"><i class="fa fa-check p-1" aria-hidden="true"></i></a></span>
                            @else
                                <span class="badge badge-pill badge-danger"><i class="fa fa-close p-1" aria-hidden="true"></i></span>
                            @endif
                        </td>

                        {{-- Edit --}}
                        <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-events-form-edit-{{ $item->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="admin-events-form-edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="admin-events-form-edit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {{-- form --}}
                                    <form action="{{ action('Admin\Events@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="admin-events-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
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
                                                            <label for="nameEvents">ชื่อกิจกรรม</label>
                                                            <input type="text" name="nameEvents" value="{{ $item->events_name }}" class="form-control">
                                                        </div>

                                                        {{-- image --}}
                                                        <div class="form-group">
                                                            <label for="imageEvents">รูปภาพ :: {{ substr($item->events_image,4) }}</label>
                                                            <input type="file" name="imageEvents" value="" class="form-control-file">
                                                            <img src="{{ asset($item->events_image) }}" alt="{{ $item->events_name }}" class="rounded p-2 " style="height: 100px;">
                                                        </div> 
                                                        
                                                        {{-- Date --}}
                                                        <div class="form-group">
                                                            <label for="dateEvents">วันที่</label>
                                                            <input type="date" name="dateEvents" value="{{ $item->events_date }}" class="form-control">
                                                        </div>

                                                        {{-- Where --}}
                                                        <div class="form-group">
                                                            <label for="whereEvents">สถานที่</label>
                                                            <input type="text" name="whereEvents" value="{{ $item->events_where }}" class="form-control">
                                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                                        </div>

                                                        {{-- Register --}}
                                                        <div class="form-group">
                                                            <label for="linkRegEvents">link ลงทะเบียน</label>
                                                            <input type="text" name="linkRegEvents" value="{{ $item->events_linkReg }}" class="form-control">
                                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                                        </div>

                                                        {{-- link image Google Drive --}}
                                                        <div class="form-group">
                                                            <label for="linkImageEvents">link แฟ้มรูปภาพ</label>
                                                            <input type="text" name="linkImageEvents" value="{{ $item->events_linkImage }}" class="form-control">
                                                            <small class="form-text text-muted">ลิงก์แชร์แฟ้มรูปภาพ จาก Google Drive (*อย่าลืมเปิดแชร์แฟ้มก่อนนำมากรอกลงฟอร์ม)</small>
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
                            <form class="delete_form" action="{{ action('Admin\Events@destroy',$item->id) }}" method="post">
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
@endsection