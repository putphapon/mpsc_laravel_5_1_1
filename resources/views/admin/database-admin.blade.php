@extends('layouts.layout-admin')

@section('title-bar', 'Database')

@section('content')

<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">ฐานข้อมูล</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')

    {{-- form --}}
    <div class="row">
        <div class="col">
            {{-- Modal Insert --}}
            <div class="modal fade" id="admin-database-form" tabindex="-1" role="dialog" aria-labelledby="admin-database-form" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    {{-- form --}}
                    <form action="{{ action('Admin\Database@store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="admin-database-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
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
                                            <label for="nameeDatabase">ชื่อฐานข้อมูล</label>
                                            <input type="text" name="nameDatabase" value="" class="form-control">
                                        </div>

                                        {{-- link --}}
                                        <div class="form-group">
                                            <label for="linkDatabase">URL ฐานข้อมูล</label>
                                            <input type="text" name="linkDatabase" value="" class="form-control">                                   
                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                        </div>

                                        {{-- image --}}
                                        <div class="form-group">
                                            <label for="imageDatabase">รูปภาพโลโก้ ฐานข้อมูล</label>
                                            <input type="file" class="form-control-file"  name="imageDatabase" value="">
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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-database-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
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
                        <th scope="col">ชื่อฐานข้อมูล</th>
                        <th scope="col">URL ฐานข้อมูล</th>
                        <th scope="col">รูปภาพโลโก้ ฐานข้อมูล</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($database as $item) 
                    <tr>
                        {{-- No. --}}
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- Name --}}
                        <td>{{ $item->database_name }}</td>
                        {{-- link --}}
                        <td>{{ $item->database_link }}</td>
                        {{-- image --}}
                        <td>                        
                            <img 
                            {{-- cut sting '/public/' --}}
                            src="{{ '' }}" 
                            alt="{{ $item->database_name }}"
                            class="rounded" style="height: 100px;">
                        </td>
                        {{-- Edit --}}
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-database-form-edit-{{ $item->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="admin-database-form-edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="admin-database-form-edit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {{-- form --}}
                                    <form class="edit_form" action="{{ action('Admin/Database@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="admin-database-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
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
                                                            <label for="nameDatabase">ชื่อฐานข้อมูล</label>
                                                            <input type="text" name="nameDatabase" value="{{ $item->database_name }}" class="form-control">
                                                        </div>

                                                        {{-- link --}}
                                                        <div class="form-group">
                                                            <label for="linkDatabase">URL ฐานข้อมูล</label>
                                                            <input type="text" name="linkDatabase" value="{{ $item->database_link }}" class="form-control">                                   
                                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                                        </div>

                                                        {{-- image --}}
                                                        <div class="form-group">
                                                            <label for="imageDatabase">รูปภาพโลโก้ ฐานข้อมูล :: {{ $item->database_image }}</label>
                                                            <input type="file" name="imageDatabase" value="" class="form-control-file">
                                                            <img src="{{ '' }}" alt="{{ $item->database_name }}" class="p-2 rounded" style="height: 100px;">
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
                            <form class="delete_form" action="{{ action('Admin/Database@destroy',$item->id) }}" method="post">
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