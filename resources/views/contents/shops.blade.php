<section id="shop">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ร้านหนังสือ</h1>
        </div>

        <!-- section content -->
        <div class="row d-flex justify-content-around">
        @foreach ($shops as $item)
            <div class="card cardShadow col-md-4 col-sm-12 mb-2 p-3 bg-white rounded">
            <img src="{{ asset($item->shops_image) }}" class="img-thumbnail rounded" alt="{{ $item->shops_name }}">                    

                <div class="card-body text-center">
                    <a href="{{ $item->shops_link }}" class="text-dark text-decoration-none" target="_blank">
                        <h5 class="card-titlept-3 pb-3">{{ $item->shops_name }}</h5>
                        <i class="fa fa-book"></i> อ่าน
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



