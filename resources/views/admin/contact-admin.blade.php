@extends('layouts.layout-admin')

@section('title-bar', 'Contact')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">ติดต่อเรา</h1>
        </div>
    </div>
    <br>

    {{-- alert --}}
    @include('layouts.alert-admin')
    
    {{-- data --}}
    <div class="row">
        <div class="col">
            <table class="table table-sm table-hover">
                <thead class="bg-info text-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อโครงการ</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">เบอร์โทรศัพท์</th>
                        <th scope="col">แก้ไข</th>
                        {{-- <th scope="col">ลบ</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($contact as $item)
                    <tr>
                        {{-- No. --}}
                        <th scope="row">{{ ++$i }}</th>
                        {{-- Name --}}
                        <td>{{ $item->contact_name }}</td>
                        {{-- address --}}
                        <td>{{ $item->contact_address }}</td>
                        {{-- phone --}}
                        <td>{{ $item->contact_phone }}</<td>
                        {{-- Edit --}}
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admin-contact-form-edit-{{ $item->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="admin-contact-form-edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="admin-Contact-form-edit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {{-- form --}}
                                    <form class="edit_form" action="{{ action('Admin\Contact@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="admin-Contact-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข ข้อมูล</h4>
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
                                                            <label for="nameContact">ชื่อโครงการ</label>
                                                            <input type="text" name="nameContact" value="{{ $item->contact_name }}" class="form-control">
                                                        </div>

                                                        {{-- address --}}
                                                        <div class="form-group">
                                                            <label for="addressContact">ที่อยู่</label>
                                                            <input type="text" name="addressContact" value="{{ $item->contact_address }}" class="form-control">
                                                            <small class="form-text text-muted">ใส่เครื่องหมาย # ถ้ายังไม่มีลิงก์</small>
                                                        </div>

                                                        {{-- phone --}}
                                                        <div class="form-group">
                                                            <label for="phoneContact">เบอร์โทรศัพท์</label>
                                                            <input type="text" name="phoneContact" value="{{ $item->contact_phone }}" class="form-control">
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
                        {{-- Delete
                        <td>
                            <form class="delete_form" action="{{ action('Admin\Contact@destroy',$item->id) }}" method="post">
                                {{- DELETE -}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <button class="btn btn-danger btn-sm" type="submit" value="Submit"><i class="fa fa-trash-o" aria-hidden="true"></i>  ลบ</button>
                                </form>
                            </td>
                        </tr>
                         --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <br>

</div>
@endsection