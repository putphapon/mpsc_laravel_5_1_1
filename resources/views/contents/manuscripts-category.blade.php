<!-- section content -->
<section id="manuscript">
    <div class="container">
        @foreach ($manuscripts_category as $item)
        <div class="row bg-light rounded-bottom shadow-lg pr-3 pl-3 mb-2">
            <h1 class="headerTitle ">{{$item->manuscripts_category_name}}</h1>
        </div>

        <div class="m-0 p-0">
            <img src="{{ asset($item->manuscripts_category_image) }}" class="rounded-bottom cardShadow mw-100 m-0 p-0">
            <p class="m-5 pt-2 lead">{{$item->manuscripts_category_detail}}</p>
        </div>

        <div class="row">
            @foreach ($manuscripts_blog as $subitem)
                @if ($subitem->manuscripts_category_id == $item->id) 
                <div class="col-md-4 col-sm-6 mb-3 p-3">
                    <div class="card cardShadow bg-transparent">
                        <div class="card-img pb-2" >
                            <img src="{{ asset($subitem->manuscripts_blog_image) }}" class="card-img-top rounded " alt="">
                        </div>

                        <div class="card-title text-center">
                            <h5>{{$subitem->manuscripts_blog_name}}</h5>
                        </div>
                    
                        <div class="card-para overflow-auto p-3 mb-2">
                            <p>{{$subitem->manuscripts_blog_detail}}</p>
                        </div>
                    </div>
                    <a href="/home/manuscriptsblog/{{$subitem->id}}" class="text-decoration-none btn btn-light btn-block mt-auto" target="_blank">
                        <p class="m-0 p-0"><i class="fa fa-book-open"></i> คลิกอ่าน</p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
</section>
