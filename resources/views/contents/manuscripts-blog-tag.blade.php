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
            {{-- item --}}
            <div class="media shadow-sm p-3 mb-2 bg-white rounded">
                <img src="{{ asset($item->manuscripts_blog_image) }}" class="rounded-lg mr-3" alt="{{ $item->manuscripts_blog_name }}" style="max-height:100px;max-width:150px;">
                <div class="media-body">
                    <a href="/home/manuscriptsblog/{{$item->id}}"  class="text-decoration-none"><h5 class="m-0 p-0">{{ $item->manuscripts_blog_name }}</h5></a>
                    <a href="/home/manuscriptsblogtag/{{ $item->manuscripts_category_name }}"><p class="m-0 p-0"><small>{{ $item->manuscripts_category_name }}</small></p></a>
                    <div>
                        <div class="overflow-auto" style="max-height: 150px;">

                            <p class="text-justify text-break">{{ $item->manuscripts_blog_detail }}</p>
                        </div>
                        
                        {{-- share --}}
                        <div class="d-flex justify-content-start p-1">
                            {{-- facebook --}}
                            <a class="fb-share-button m-1" 
                                data-href="http://mps-center.in.th/home/manuscriptsblog/{{$item->id}}" 
                                data-layout="button_count" data-size="small">
                                <a 
                                    target="_blank" 
                                    href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmps-center.in.th%2Fhome%2Fmanuscriptsblog%2F{{$item->id}}&amp;src=sdkpreparse" 
                                    class="fb-xfbml-parse-ignore">
                                </a>
                            </a>
        
                            {{-- twitter --}}
                            <a class="twitter-share-buttony m-1 badge badge-primary"
                                href="https://twitter.com/intent/tweet?text={{$item->manuscripts_blog_name}}%20กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน%20http://mps-center.in.th/home/manuscriptsblog/{{$item->id}}"
                                target="_blank"
                                data-size="small">
                                <i class="fab fa-twitter"></i>
                            Tweet
                            </a>
        
                            {{-- line --}}
                            <div class="line-it-button m-1" 
                                data-lang="th" 
                                data-type="share-a" 
                                data-ver="3" 
                                data-url="http://mps-center.in.th/home/manuscriptsblog/{{$item->id}}" 
                                data-color="default" 
                                data-size="small" 
                                data-count="true" 
                                style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="align-self-center ml-3"  data-toggle="tooltip"  data-placement="left" title="คลิกอ่าน"><a href="{{ $item->manuscripts_blog_link }}" class=" badge badge-pill badge-primary"><i class="fas fa-book"></i></a></h1>
            </div>
        </div>
        @endforeach
</section>