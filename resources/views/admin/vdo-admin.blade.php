@extends('layouts.layout-admin')

@section('title-bar', 'VDO')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">สื่อ VDO</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')
       
    {{-- form --}}
    <div class="row">
        <div class="col">
            {{-- Modal Insert --}}
            <div class="modal fade" id="admin-vdo-form" tabindex="-1" role="dialog" aria-labelledby="admin-vdo-form" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    {{-- form --}}
                    <form action="{{ action('AdminVDO@store') }}" method="post" enctype="multipart/form-data">
                        @csrf @method('POST')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="admin-vdo-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล<h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        {{-- name --}}
                                        <div class="form-group">
                                            <label for="nameVDO">ชื่อเรื่อง</label>
                                            <input type="text" name="nameVDO" value="" class="form-control">
                                        </div>

                                        {{-- detail --}}
                                        <div class="form-group">
                                            <label for="detailVDO">คำเกริ่น</label>
                                            <textarea name="detailVDO" value="" class="form-control" row="5"></textarea>
                                        </div>

                                        {{-- link --}}
                                        <div class="form-group">
                                            <label for="linkVDO">ลิงก์ VDO Youtube</label>
                                            <input type="text" name="linkVDO" value="" class="form-control">                                    
                                            <small class="form-text text-muted">เข้า Youtube แล้วไปที่ Share -> Embed ก๊อปปี้ข้อความนี้มากรอกลง<br>'https://www.youtube.com/embed/xxxxxxxxxx'</small>
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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admin-vdo-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่ม</button>
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
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">คำเกริ่น</th>
                        <th scope="col">ลิงก์ VDO Youtube</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item) 
                    <tr>
                        {{-- No. --}}
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- Name --}}
                        <td>{{ $item['vdo_name'] }}</td>
                        {{-- detail --}}
                        <td>{{ $item['vdo_detail'] }}</td>

                        {{-- Link --}}
                        <td>
                            @if($item['vdo_link'])
                                <span class="badge badge-pill badge-success"><i class="fa fa-check p-1" aria-hidden="true"></i></span>
                            @else
                                <span class="badge badge-pill badge-danger"><i class="fa fa-close p-1" aria-hidden="true"></i></span>
                            @endif
                        </td>
                        {{-- Edit --}}
                        <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-vdo-form-edit-{{ $item['id'] }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="admin-vdo-form-edit-{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="admin-vdo-form-edit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {{-- form --}}
                                    <form action="{{ action('AdminVDO@update',$item['id']) }}" method="post" enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="admin-vdo-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        {{-- name --}}
                                                        <div class="form-group">
                                                            <label for="nameVDO">ชื่อเรื่อง</label>
                                                            <input type="text" name="nameVDO" value="{{ $item['vdo_name'] }}" class="form-control">
                                                        </div>

                                                        {{-- detail --}}
                                                        <div class="form-group">
                                                            <label for="detailVDO">คำเกริ่น</label>
                                                            <textarea name="detailVDO" value="" class="form-control" row="5">{{ $item['vdo_detail'] }}</textarea>
                                                        </div>

                                                        {{-- link --}}
                                                        <div class="form-group">
                                                            <label for="linkVDO">ลิงก์ VDO Youtube</label>
                                                            <input type="text" name="linkVDO" value="{{  $item['vdo_link'] }}" class="form-control">                                    
                                                            <small class="form-text text-muted">เข้า Youtube แล้วไปที่ Share -> Embed ก๊อปปี้ข้อความนี้มากรอกลง<br>'https://www.youtube.com/embed/xxxxxxxxxx'</small>
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
                            <form class="delete_form" action="{{ action('AdminVDO@destroy',$item['id']) }}" method="post">
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
@endsection