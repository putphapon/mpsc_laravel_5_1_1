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

       



</div>
@endsection