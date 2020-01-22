<!-- section content -->
<section>
    @foreach ($manuscripts_blog as $item)
    <div class="container p-5">
        <div class="row">
            <h1 class="headerTitle">{{$item->manuscripts_blog_name}}</h1>
        </div>

        <div class="text-center">
            <img src="{{ asset('/storage/'.substr($item->manuscripts_blog_image,7)) }}" class="rounded cardShadow w-100">
        </div>

        <div class="row pt-4">
            <p class="pt-2">{{$item->manuscripts_blog_detail}}</p>

            <a href="{{$item->manuscripts_blog_link}}" class="text-decoration-none btn btn-light btn-block" target="_blank">
            <p><i class="fa fa-book-open"></i> คลิกอ่าน</p></a>

            <p><small>{{$item->manuscripts_blog_tag}}</small></p>
        </div>
    </div>
    @endforeach
</section>