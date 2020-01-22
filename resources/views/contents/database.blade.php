<section id="database">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ฐานข้อมูล</h1>
        </div>

        <div class="d-flex justify-content-around align-items-center">
            @foreach ($database as $item)  
                <div class="col-md-4 text-center">
                    <a href="{{$item->database_link}}" class="">
                        {{-- <i class="fa fa-database" style="font-size:10rem"></i> --}}
                        <img src="{{ asset('/storage/'.substr($item->database_image,6)) }}" alt="{{ $item->database_name }}" class="rounded p-2 " style="height: 100px;">
                        
                        <h6>{{$item->database_name}}</h6>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>