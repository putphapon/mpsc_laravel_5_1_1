@extends('layouts.layout-login')

@section('title-bar', 'Login')

@section('content')

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <img src="\img\footerpage.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h1 class="card-title">เข้าระบบ</h1>
                    <a href="/" class="btn btn-light btn-sm" role="button">หน้าหลัก</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}
                
                    <div class="form-group">
                        <label for="email">ที่อยู่อีเมล</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>
                
                    <div class="form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                
                    <div class="form-group form-check">
                        <input type="checkbox" name="remember" class="form-check-input">
                        <label class="form-check-label" for="exampleCheck1">จดจำฉัน</label>
                        </div>
                
                    <button type="submit" class="btn btn-primary" type="submit">เข้าระบบ</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
