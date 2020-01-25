@extends('layouts.layout')

@section('title-bar','Home')

@section('content')

{{-- title --}}
<section id="title" class="title">
    <!-- carousel  -->
    <div class="d-flex justify-content-center">
      <div id="carouselTitle" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            @for($i = 1; $i <= count($title); $i++)
              @if( $i == 1 )
                <li data-target="#carouselTitle" data-slide-to="{{ $i }}" class="active"></li>
              @else
                <li data-target="#carouselTitle" data-slide-to="{{ $i }}"></li>
              @endif
            @endfor
          </ol> 
  
          <!-- carousel-inner  -->
          <div class="carousel-inner col">
            <?php $i = 1 ?>
            @foreach ($title as $item)
              @if( $i == 1 )
                <div class="carousel-item active" data-interval="5000">
                  <img src="{{ asset($item->title_image) }}" class="min-vw-100 vh-100" alt="{{ $item->title_name }}">
                </div>
              @else
                <div class="carousel-item" data-interval="5000">
                  <img src="{{ asset($item->title_image) }}" class="min-vw-100 vh-100" alt=" {{ $item->title_name }}">
                </div>
              @endif
              <?php $i++ ?>
            @endforeach
          </div>
      </div>
    </div>
  </section>
  
  <section class="d-flex justify-content-around align-items-center text-center  detailTitle">
    <div>
        <h1>กิจของเรา... ไม่ใช่เพื่อประโยชน์ของตนเอง<br>
          แต่เพื่อให้เป็นความดี...แก่ผู้ที่จะมาในภายหลัง</h1>
        <p class="text-muted blockquote-footer">พุทธวจนะ</p>
    </div>
</section>

{{-- database --}}
<section id="database">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ฐานข้อมูล</h1>
        </div>

        <div class="d-flex justify-content-around align-items-center">
            @foreach ($database as $item)  
                <div class="col-md-4 text-center">
                    <a href="{{$item->database_link}}" class="">
                        <img src="{{ asset($item->database_image) }}" alt="{{ $item->database_name }}" class="rounded p-2 " style="height: 100px;">
                        
                        <h6>{{$item->database_name}}</h6>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex flex-row-reverse p-6">
            <a href="{{ action('Home\Database@index')}}"><p class="badge badge-pill badge-light"> เพิ่มเติม... </p></a>
        </div>
    </div>
</section>

{{-- scholar --}}
<section id="scholar">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle ">บทความวิชาการ/งานวิจัย</h1>
        </div>

        <!--  scholar -->
        <div class="row">
            @foreach ($scholar_category as $item)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0 text-decoration-none">
                            <button class="btn btn-link collapse show" type="button">{{ $item->scholar_category_name }}</button>
                        </h2>
                    </div>
                    <div class="collapsed">
                        <div class="card-body">
                            <?php $i = 0;  ?>
                            @foreach ($scholar_blog as $subitem)
                                @if (($subitem->scholar_category_id == $item->id) && ($i < 3))
                                    <a href="{{ $subitem->scholar_blog_link }}" target="blank" class="text-decoration-none">{{ $subitem->scholar_blog_name }}
                                        <footer class="blockquote-footer">{{ $subitem->scholar_blog_author }}</footer>
                                    </a>
                                    <br>
                                    <?php $i++; ?>
                                @endif
                            @endforeach
    
                            <div class="text-right">
                                <a href="{{ action('Home\Scholar@index')}}"><p class="badge badge-pill badge-light"> อ่านต่อ </p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex flex-row-reverse  p-6">
            <a href="{{ action('Home\Scholar@index')}}"><p class="badge badge-pill badge-light"> เพิ่มเติม... </p></a>
        </div>
    </div>
</section>

{{-- manuscripts --}}
<section id="manuscript">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ธารความรู้</h1>
        </div>

        {{-- search --}}
        <div class="row p-2">
            <div class="pt-3 pb-3 w-100">
                <form action="{{ action('Home\ManuscriptsBlogTag@store') }}" method="post">
                    <div class="input-group">

                        {{-- POST --}}
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {{-- input --}}
                        <input type="text" name="search" value="" class="form-control" placeholder="ค้นหา">
                        
                        {{-- submit --}}
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" value="Submit">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- section content -->
        <div class="row mt-3 mb-3">
            @foreach ($manuscripts_category as $item)
                <div class="col-md-4 col-sm-6 pb-5">
                    <div class="card cardShadow bg-transparent">
                        <img src="{{ asset($item->manuscripts_category_image) }}" class="card-img-top" style="max-height: 250px;" alt=" ">
                        <div class="p-3">
                            <h5 class="card-title pt-3 text-center"><i class="fa fa-books"></i>{{$item->manuscripts_category_name}}</h5>
                            <p>{{$item->manuscripts_category_detail}}</p>
    
                            <!-- content -->
                            <?php $i = 0;  ?>
                                @foreach ($manuscripts_blog as $subitem)
                                    @if (($subitem->manuscripts_category_id == $item->id) && ($i < 3))
                                        <a href="/home/manuscriptsblog/{{$subitem->id}}" class="text-decoration-none text-muted">
                                            <p class="h6"><i class="fa fa-book-open"></i>   {{$subitem->manuscripts_blog_name}}</p>
                                        </a> 
                                    <?php $i++; ?>
                                @endif
                            @endforeach
                        </div>
    
                        <div class="text-right pr-3">
                            <a href="/home/manuscriptscategory/{{$item->id}}"><p class="badge badge-pill badge-light"> อ่านต่อ </p></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex flex-row-reverse p-6">
            <a href="{{ action('Home\Manuscripts@index')}}"><p class="badge badge-pill badge-light"> เพิ่มเติม... </p></a>
        </div>
    </div>
</section>

{{-- vdo --}}
<section id="vdo">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">สื่อ VDO</h1>
        </div>
    
        <!-- section content -->
        <div class="d-flex justify-content-around">
            <?php $i = 0;  ?>
            @foreach ($vdo as $item)
                @if ($i < 3)
                    <div class="col-md-4">
                        <div class="card cardShadow bg-transparent">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $item->vdo_link }}" allowfullscreen></iframe>
                            </div>
                            <div class="p-3">
                                <h5 class="card-title pt-3 text-center">{{ $item->vdo_name }}"</h5>
                                <p>{{ $item->vdo_detail }}"</p>
                            </div>
                        </div>
                    </div>
                    <?php $i++;  ?>
                @endif
            @endforeach
        </div>

        <div class="d-flex flex-row-reverse p-6">
            <a href="{{ action('Home\Vdo@index')}}"><p class="badge badge-pill badge-light"> เพิ่มเติม... </p></a>
        </div>
    </div>
</section>

{{-- events --}}
<section id="events">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">กิจกรรม</h1>
        </div>


        <!-- section content -->
        <div class="row mt-3 mb-3">
            <?php $i = 0;  ?>
            @foreach ($events as $item)
                @if ($i < 3)
                    <div class="d-flex justify-content-around col-md-4 col-sm-12">
                        <div class="card cardShadow cardPosition mb-5 bg-white rounded">
                            <img src="{{ asset($item->events_image) }}" class="card-img-top" alt=" ">
                            <div class="card-body">
                                <h5 class="card-title"> </h5>
                                    <p class="card-text text-muted">วันที่ {{ $item->events_date}}</p>
                                    <p class="card-text text-muted">{{ $item->events_where }}</p>                        
                                    
                                    @if (date($item->events_date) >= date("Y-m-d") && $item->events_linkReg != '#')
                                        <a href="{{$item->events_linkReg}}" class="btn btn-outline-danger btn-block">ลงทะเบียน</a>
                                    @elseif ($item->events_linkImage != '#')
                                        <a href="{{$item->events_linkImage}}" class="btn btn-outline-info btn-block">ประมวลภาพ</a>
                                    @else
                                        {{-- <a class="btn btn-outline-light btn-block"></i></a> --}}
                                    @endif
                            </div>
                        </div>
                    </div>
                    <?php $i++;  ?>
                @endif
            @endforeach
        </div>

        <div class="d-flex flex-row-reverse p-6">
            <a href="{{ action('Home\Events@index')}}"><p class="badge badge-pill badge-light"> เพิ่มเติม... </p></a>
        </div>
    </div>
</section>

{{-- shop --}}
<section id="shop">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ร้านหนังสือ</h1>
        </div>

        <!-- section content -->
        <div class="d-flex justify-content-around mt-3 mb-3">
            <?php $i = 0;  ?>
            @foreach ($shops as $item)
                @if ($i < 3)
                    <div class="card col-md-3 col-sm-12 cardShadow bg-white rounded">
                        <img src="{{ asset($item->shops_image) }}" class="img-thumbnail rounded" alt="{{ $item->shops_name }}">                    

                        <div class="card-body text-center">
                            <a href="{{ $item->shops_link }}" class="text-dark text-decoration-none" target="_blank">
                                <h5 class="card-titlept-3 pb-3">{{ $item->shops_name }}</h5>
                                <i class="fa fa-book"></i> อ่าน
                            </a>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endif
            @endforeach
        </div>

        <div class="d-flex flex-row-reverse p-6">
            <a href="{{ action('Home\Shops@index')}}"><p class="badge badge-pill badge-light"> เพิ่มเติม... </p></a>
        </div>
    </div>
</section>

@endsection