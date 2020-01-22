<section id="scholar">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">บทความวิชาการ/งานวิจัย</h1>
        </div>

        <!--  scholar -->
        <div class="row">
            @foreach ($scholar_category as $item)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0 text-decoration-none">
                            <button class="btn btn-link collapse show" type="button">{{ $item->scholar_category_name }}</button>
                        </h2>
                    </div>
                    <div class="collapsed">
                        <div class="card-body">
                            @foreach ($scholar_blog as $subitem)
                                @if ($subitem->scholar_category_id == $item->id)
                                    <a href="{{ $subitem->scholar_blog_link }}" target="blank" class="text-decoration-none">{{ $subitem->scholar_blog_name }}
                                        <footer class="blockquote-footer">{{ $subitem->scholar_blog_author }}</footer>
                                    </a>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    
    </div>
</section>