<!-- section content -->
<section>
    @foreach ($manuscripts_blog as $item)
    <div class="container p-5">
        <div class="row bg-light rounded-bottom shadow-lg pr-3 pl-3 mb-2">
            <h6 class="headerTitle">{{$item->manuscripts_blog_name}}</h6>
        </div>

        <div class="blockquote text-right p-4">
            <p class="blockquote-footer">แหล่งที่มา <cite>{{$item->manuscripts_blog_reference}}</cite></p>
        </div>

        <div class="text-center">
            <img src="{{ asset($item->manuscripts_blog_image) }}" class="rounded cardShadow mw-100">
        </div>

        {{-- share --}}
        <div class="d-flex justify-content-end pt-4 pb-2">
            {{-- facebook --}}
            <a class="fb-share-button m-1" 
                data-href="http://mps-center.in.th/home/manuscriptsblog/{{$item->id}}" 
                data-layout="button_count" data-size="large">
                <a 
                    target="_blank" 
                    href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmps-center.in.th%2Fhome%2Fmanuscriptsblog%2F{{$item->id}}&amp;src=sdkpreparse" 
                    class="fb-xfbml-parse-ignore">
                </a>
            </a>

            {{-- twitter --}}
            <a class="twitter-share-buttony m-1 btn btn-primary btn-sm" tabindex="-1" role="button"
                href="https://twitter.com/intent/tweet?text={{$item->manuscripts_blog_name}}%20กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน%20http://mps-center.in.th/home/manuscriptsblog/{{$item->id}}"
                target="_blank"
                data-size="large">
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
                data-size="large" 
                data-count="true" 
                style="display: none;">
            </div>
            

        </div>

        <div class="row">
            <p class="p-2  lead">{{$item->manuscripts_blog_detail}}</p>

            <a href="{{$item->manuscripts_blog_link}}" class="text-decoration-none btn btn-primary btn-block" target="_blank">
                <p class="text-center m-0 p-0"><i class="fa fa-book-open"></i> คลิกอ่าน</p></a>

                <div class="mt-3 p-4">
                    <p class="p-0 m-0"><small>แท๊ก</small></p>
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