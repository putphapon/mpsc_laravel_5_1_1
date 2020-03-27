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
    <div class="row pt-3 pb-3">
        @foreach ($manuscripts_category as $item)
            <div class="col-md-4 col-sm-6 pb-5">
                <div class="card cardShadow bg-transparent">
                    <div class="card-img">
                        <img src="{{ asset($item->manuscripts_category_image) }}" class="card-img-top" style="max-height: 250px;" alt=" ">
                    </div>
                    
                    <h5 class="card-title pt-3 text-center"><i class="fa fa-books"></i>{{$item->manuscripts_category_name}}</h5>
                    
                    <div class="card-subject pr-3 pl-3">
                        <p>{{$item->manuscripts_category_detail}}</p>
                    </div>

                    <div class="card-subject pr-3 pl-3">
                        <!-- content -->
                        <?php $i = 0;  ?>
                            @foreach ($manuscripts_blog as $subitem)
                                @if (($subitem->manuscripts_category_id == $item->id) && ($i < 3))
                                    <a href="/home/manuscriptsblog/{{$subitem->id}}" class="text-decoration-none text-muted m-0 p-0">
                                        <p class="text-truncate m-0 p-0" style="max-width: auto;"><i class="fa fa-book-open"></i>   {{$subitem->manuscripts_blog_name}}</p>
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



