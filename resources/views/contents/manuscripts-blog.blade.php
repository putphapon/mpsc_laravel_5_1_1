<!-- section content -->
<section>
    @foreach ($manuscripts_blog as $item)
    <div class="container p-5">
        <div class="row sticky-top bg-light rounded-bottom shadow-lg pr-3 pl-3 mb-2">
            <h3 class="headerTitle">{{$item->manuscripts_blog_name}}</h3>
        </div>

        <div class="text-center">
            <img src="{{ asset($item->manuscripts_blog_image) }}" class="rounded cardShadow w-100">
        </div>

        <div class="row pt-4">
            <p class="pt-2">{{$item->manuscripts_blog_detail}}</p>

            <a href="{{$item->manuscripts_blog_link}}" class="text-decoration-none btn btn-primary btn-block" target="_blank">
            <p class="m-0 p-0"><i class="fa fa-book-open"></i> คลิกอ่าน</p></a>

            <div class="mt-3">
                <?php $tag = explode(",",$item->manuscripts_blog_tag) ?>
                @foreach ($tag as $temp)
                    @if ($temp != '#')
                        <a class="badge badge-pill badge-primary" href="/home/manuscriptsblogtag/{{trim($temp)}}">{{ trim($temp) }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</section>