<!-- resources/views/auth/register.blade.php -->
@extends('layouts.layout-login')

@section('title-bar', 'Register')

@section('content')

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <img src="\img\footerpage.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h1>ลงทะเบียน</h1>
                    <a href="/" class="btn btn-light btn-sm" role="button">หน้าหลัก</a>
                    
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/auth/register">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">ชื่อ-สกุล</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">ที่อยู่อีเมล</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>
                
                    <div class="form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">รหัสผ่านอีกครั้ง</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary" type="submit">ลงทะเบียน</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
