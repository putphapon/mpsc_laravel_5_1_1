<section id="title" class="title">
  <!-- carousel  -->
  <div class="d-flex justify-content-center">
    <div id="carouselTitle" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          @for($i = 1; $i <= count($title); $i++)
            @if( $i == 1 )
              <li data-target="#carouselTitle" data-slide-to="{{ $i }}" class="active"></li>
            @else
              <li data-target="#carouselTitle" data-slide-to="{{ $i }}"></li>
            @endif
          @endfor
        </ol> 

        <!-- carousel-inner  -->
        <div class="carousel-inner col">
          @foreach ($title as $item)
            @if( $loop->iteration == 1 )
              <div class="carousel-item active" data-interval="5000">
                <img src="{{ asset('/storage/'.substr($item->title_image,7)) }}" class="min-vw-100 vh-100" alt="{{ $item->title_name }}">
              </div>
            @else
              <div class="carousel-item" data-interval="5000">
                <img src="{{ asset('/storage/'.substr($item->title_image,7)) }}" class="min-vw-100 vh-100" alt=" {{ $item->title_name }}">
              </div>
            @endif
          @endforeach
        </div>
    </div>
  </div>
</section>

<section class="d-flex justify-content-around align-items-center text-center">
  <div>
      <h1>กิจของเรา... ไม่ใช่เพื่อประโยชน์ของตนเอง<br>
        แต่เพื่อให้เป็นความดี...แก่ผู้ที่จะมาในภายหลัง</h1>
      <p class="text-muted blockquote-footer">พุทธวจนะ</p>
  </div>
</section>