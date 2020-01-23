<section id="manuscript">
<div class="container">
    <div class="row">
        {{-- ธารความรู้ --}}
        <h1 class="headerTitle">ธารความรู้</h1>
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
                                <?php $i++;  ?>
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
</div>
</section>



