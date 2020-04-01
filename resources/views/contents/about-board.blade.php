<!-- section content -->
<section>
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">คณะที่ปรึกษา</h1>
        </div>
    </div>

    <div class="row d-flex justify-content-around">
    @foreach ($about_board as $item)
        <div class="col">
            <img src="{{ asset($item->about_board_image) }}" alt="{{ $item->about_board_name}}" class="rounded-lg p-3 img-fluid">
        </div>
    @endforeach
    </div>


</section>