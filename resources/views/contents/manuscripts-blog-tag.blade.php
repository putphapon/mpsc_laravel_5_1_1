<!-- section content -->
<section>
    <div class="container">
        <div class="row">
            @if ($manuscripts_blog == null)
                <?php  $search = 'ไม่พบบทความ' ?> 
            @endif
            <h1 class="headerTitle">คำค้นหา :: {{ $search }}</h1>
        </div>

        @foreach ($manuscripts_blog as $item)
        <div class="row">
            <div class="media shadow-sm p-3 mb-2 bg-white rounded">
                <img src="{{ asset($item->manuscripts_blog_image) }}" class="rounded-lg mr-3" alt="{{ $item->manuscripts_blog_name }}" style="height:100px;">
                <div class="media-body">
                    <a href="/home/manuscriptsblog/{{$item->id}}"  class="text-decoration-none">
                        <h5 class="m-0 p-0">{{ $item->manuscripts_blog_name }}</h5>
                    </a>
                    <a href="/home/manuscriptsblogtag/{{ $item->manuscripts_category_name }}"><p class="m-0 p-0"><small>{{ $item->manuscripts_category_name }}</small></p></a>
                    <p class="text-justify text-break">{{ $item->manuscripts_blog_detail }}</p>
                </div>
                    <h1 class="align-self-center ml-3"  data-toggle="tooltip"  data-placement="left" title="คลิกอ่าน"><a href="{{ $item->manuscripts_blog_link }}" class=" badge badge-pill badge-primary"><i class="fas fa-book"></i></a></h1>
             
            </div>
        </div>
        @endforeach
</section>