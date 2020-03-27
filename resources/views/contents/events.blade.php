<section id="events">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">กิจกรรม</h1>
        </div>


        <!-- section content -->
        <div class="row pt-3 pb-3">
            @foreach ($events as $item)
                <div class="d-flex justify-content-around col-md-4 col-sm-12 mb-5 m-0 p-0">
                    <div class="card cardShadow cardPosition bg-white rounded">
                        <img src="{{ asset($item->events_image) }}" class="card-img-top" alt=" ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->events_name}}</h5>
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
            @endforeach
        </div>
    </div>
</section>



