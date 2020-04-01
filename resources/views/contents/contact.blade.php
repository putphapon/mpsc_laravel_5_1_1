<section id="contact">
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">ติดต่อเรา</h1>
        </div>

        @foreach ($contact as $item)
            <div>
                <h5>ชื่อโครงการ</h5>
                <h3>{{  $item->contact_name }}</h3>
            </div>
            <br>

            <div>
                <h5>ที่อยู่</h5>
                <h3>{{  $item->contact_address }}</h3>
            </div>
            <br>

            <div>
                <h5>เบอร์โทรศัพท์</h5>
                <h3>{{  $item->contact_phone }}</h3>
            </div>
        @endforeach

    </div>
</section>