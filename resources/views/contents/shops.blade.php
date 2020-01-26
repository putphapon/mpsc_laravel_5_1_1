<section id="shop">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ร้านหนังสือ</h1>
        </div>

        <!-- section content -->
        @foreach ($shops as $item)
        <div class="d-flex justify-content-around mt-3 mb-3">
            <div class="card col-md-3 col-sm-12 cardShadow bg-white rounded">
            <img src="{{ asset($item->shops_image) }}" class="img-thumbnail rounded" alt="{{ $item->shops_name }}">                    

                <div class="card-body text-center">
                    <a href="{{ $item->shops_link }}" class="text-dark text-decoration-none" target="_blank">
                        <h5 class="card-titlept-3 pb-3">{{ $item->shops_name }}</h5>
                        <i class="fa fa-book"></i> อ่าน
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>



