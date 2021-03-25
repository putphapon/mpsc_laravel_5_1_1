<section id="vdo">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">สื่อ VDO</h1>
        </div>

        <!-- section content -->
        <div class="row">
            <?php $flag = true ?>
            @foreach ($vdo as $item)
                @if ($flag)
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $item->vdo_link }}" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-1">
                                <span class="badge badge-danger">ตอนล่าสุด</span>
                                <h5 class="card-title pt-1 text-left">{{ $item->vdo_name }}</h5>
                                <p>{{ $item->vdo_detail }}</p>
                            </div>
                        </div>
                    </div>
                    <?php $flag = false ?>
                @else
                    <div class="col-md-4 col-sm-2 p-2">
                        <div class="card bg-white rounded" style="">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $item->vdo_link }}" allowfullscreen></iframe>
                            </div>
                            <div>
                                <h5 class="card-title pt-1 text-center p-4">{{ $item->vdo_name }}</h5>
                                <div class="card-para overflow-auto p-3 mb-2">
                                    <p>{{ $item->vdo_detail }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>