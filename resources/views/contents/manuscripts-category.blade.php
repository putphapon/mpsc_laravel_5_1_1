<!-- section content -->
<section id="manuscript">
    <div class="container">
        @foreach ($manuscripts_category as $item)
        <div class="row sticky-top bg-light rounded-bottom shadow-lg pr-3 pl-3 mb-2">
            <h1 class="headerTitle ">{{$item->manuscripts_category_name}}</h1>
        </div>

        <div class="row text-center">
            <img src="{{ asset($item->manuscripts_category_image) }}" class="rounded-bottom cardShadow w-100">
            <p class="pt-2">{{$item->manuscripts_category_detail}}</p>
        </div>
               
        <div class="row">
            @foreach ($manuscripts_blog as $subitem)
                @if ($subitem->manuscripts_category_id == $item->id) 
                <div class="col-md-4 col-sm-6 pb-5 mt-5" style="min-height: 400px;">
                    <div class="card cardShadow bg-transparent d-flex">
                        
                        <img src="{{ asset($subitem->manuscripts_blog_image) }}" class="card-img-top rounded" style="max-height: 200px;" alt="">
                        
                        <div class="p-3">
                            <h5 class="card-title pt-3 text-center"><i class="fa fa-books"></i>{{$subitem->manuscripts_blog_name}}</h5>
                            <div class="overflow-auto">
                                <p>{{$subitem->manuscripts_blog_detail}}</p>
                            </div>
                        </div>
                        
                        <a href="/home/manuscriptsblog/{{$subitem->id}}" class="text-decoration-none btn btn-light btn-block" target="_blank">
                            <p class="m-0 p-0"><i class="fa fa-book-open"></i> คลิกอ่าน</p>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
</section>
