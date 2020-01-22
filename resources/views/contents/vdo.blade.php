<section id="vdo">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">สื่อ VDO</h1>
        </div>

        <!-- section content -->
        <div class="d-flex justify-content-around">
            @foreach ($vdo as $item)
                <div class="col-md-4">
                    <div class="card cardShadow bg-transparent">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $item->vdo_link }}" allowfullscreen></iframe>
                        </div>
                        <div class="p-3">
                            <h5 class="card-title pt-3 text-center">{{ $item->vdo_name }}"</h5>
                            <p>{{ $item->vdo_detail }}"</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>