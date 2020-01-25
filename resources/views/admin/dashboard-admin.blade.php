@extends('layouts.layout-admin')

@section('title-bar', 'Dashboard')

@section('content')
<div class="container">
    {{-- dashboard --}}
    <div class="row mt-5 pt-5">
        <div class="col">
            <h1 class="bg-primary text-light rounded p-2">สวัสดี {{ Auth::user()->name }} คุณกำลังอยู่ในระบบ</h1>
        </div>
    </div>
    {{-- alert --}}
    @include('layouts.alert-admin')
    
</div>
@endsection