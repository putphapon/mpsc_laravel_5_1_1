@extends('layouts.layout-admin')

@section('title-bar', 'Shops')

@section('content')
<div class="container">
    {{-- title --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">ร้านหนังสือ</h1>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#shops-admin-form"><i class="fa fa-plus-square-o" aria-hidden="true">  </i>  เพิ่ม</button>
            {{-- Modal --}}
            <div class="modal fade" id="shops-admin-form" tabindex="-1" role="dialog" aria-labelledby="shops-admin-form" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    {{-- form --}}
                    <form action="{{ action('Admin\Shops@store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="shops-admin-form"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  เพิ่มข้อมูล</h4>
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
                                            <label for="nameShops">ชื่อหนังสือ</label>
                                            <input type="text" name="nameShops" value="" class="form-control">
                                        </div>

                                        {{-- image --}}
                                        <div class="form-group">
                                            <label for="imageShops">รูปภาพ</label>
                                            <input type="file" class="form-control-file"  name="imageShops" value="">
                                        </div>

                                        {{--link --}}
                                        <div class="form-group">
                                            <label for="linkShops">link อ่านหนังสือ</label>
                                            <input type="text" name="linkShops" value="" class="form-control">
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
            <form action="{{ action('Admin\Shops@search') }}" method="get">
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
                        <th scope="col">ชื่อหนังสือ</th>
                        <th scope="col">รูปภาพ</th>
                        <th scope="col">link อ่านหนังสือ</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($shops as $item) 
                    <tr>
                        {{-- No.  --}}
                        <th scope="row">{{ ++$i }}</th>
                        {{-- Name --}}
                        <td>{{ $item->shops_name }}</td>
                        {{-- Image --}}
                        <td>
                            <img
                            src="{{ asset($item->shops_image) }}" 
                            alt="{{ $item->shops_name }}"
                            class="rounded" style="height: 100px;">
                        </td>

                        {{-- Link --}}
                        <td>
                            @if( $item->shops_link != "#")
                                <a href="{{$item->shops_link}}" target="blank"><span class="badge badge-pill badge-success"><i class="fa fa-check p-1" aria-hidden="true"></i></span></a>
                            @else
                                <span class="badge badge-pill badge-danger"><i class="fa fa-close p-1" aria-hidden="true"></i></span>
                            @endif
                        </td>
                        {{-- Edit --}}
                        <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#shops-admin-form-edit-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไข</button>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="shops-admin-form-edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="shops-admin-form-edit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    {{-- form --}}
                                    <form class="edit_form" action="{{ action('Admin\Shops@update',$item->id) }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="shops-admin-form-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  แก้ไขข้อมูล</h4>
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
                                                            <label for="nameShops">ชื่อหนังสือ</label>
                                                            <input type="text" name="nameShops" value="{{ $item->shops_name }}" class="form-control">
                                                        </div>
                                                        
                                                        {{-- image --}}
                                                        <div class="form-group">
                                                            <label for="imageShops">รูปภาพ :: {{ substr($item->shops_image,4) }}</label>
                                                            <input type="file" name="imageShops" value="" class="form-control-file">
                                                            <img src="{{ asset($item->shops_image) }}" alt="{{ $item->shops_name }}" class="rounded p-2 " style="height: 100px;">
                                                        </div>

                                                        {{--link --}}
                                                        <div class="form-group">
                                                            <label for="linkShops">link อ่านหนังสือ</label>
                                                            <input type="text" name="linkShops" value="{{ $item->shops_link }}" class="form-control">
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
                            <form class="delete_form" action="{{ action('Admin\Shops@destroy',$item->id) }}" method="post">
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