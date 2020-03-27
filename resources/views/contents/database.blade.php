<section id="database">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ฐานข้อมูล</h1>
        </div>

        <div class="row d-flex justify-content-around mb-3 mt-3">
            @foreach ($database as $item)  
            <div class="col-sm-6 col-md-3 col-lg-3 p-4 mb-3 cardShadow rounded text-center align-items-center" style="height:250px">
                <a href="{{ $item->database_link }}" class="">
                    <div class="h-75 pr-2 pl-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset($item->database_image) }}" alt="{{ $item->database_name }}" class="mw-100 mh-100 rounded p-2">
                    </div>
                    <div class="h-25 pt-2">
                        <p>{{$item->database_name}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>