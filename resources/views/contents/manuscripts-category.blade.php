<!-- section content -->
<section id="manuscript">
    <div class="container">
        @foreach ($manuscripts_category as $item)
        <div class="row">
            <h1 class="headerTitle">{{$item->manuscripts_category_name}}</h1>
        </div>

        <div class="row text-center">
            <img src="{{ asset('/storage/'.substr($item->manuscripts_category_image,7)) }}" class="rounded cardShadow w-100">
            <p class="pt-2">{{$item->manuscripts_category_detail}}</p>
        </div>
               
        <div class="row">
            @foreach ($manuscripts_blog as $subitem)
                @if ($subitem->manuscripts_category_id == $item->id) 
                <div class="col-md-4 col-sm-6 pb-5 mt-5" style="min-height: 400px;">
                    <div class="card cardShadow bg-transparent d-flex">
                        
                        <img src="{{ asset('/storage/'.substr($subitem->manuscripts_blog_image,7)) }}" class="card-img-top" style="max-height: 200px;" alt="">
                        
                        <div class="p-3">
                            <h5 class="card-title pt-3 text-center"><i class="fa fa-books"></i></h5>
                            <div class="overflow-auto">
                                <p>{{$subitem->manuscripts_blog_detail}}</p>
                            </div>
                        </div>
                        
                        <a href="/manuscriptsblog/{{$subitem->id}}" class="text-decoration-none btn btn-light btn-block" target="_blank">
                            <p><i class="fa fa-book-open"></i> คลิกอ่าน</p>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
</section>
