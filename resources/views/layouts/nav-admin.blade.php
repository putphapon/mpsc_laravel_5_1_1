<!-- nav -->
<nav class="navbar fixed-top navbar-expand-xl">
    <a class="navbar-brand text-uppercase h1" href="/dashboard">
        <img src="/img/logo/logo-mpsc.png" alt="Manuscript Preservation and Study Center">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="ture" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase">
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Title@index') }}">หน้าหลัก</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\About@index') }}">เกี่ยวกับ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Database@index') }}">ฐานข้อมูล</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Scholar@index') }}">บทความวิชาการ/งานวิจัย</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Manuscripts@index') }}">ธารความรู้</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\VDO@index') }}">สื่อ VDO</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Events@index') }}">กิจกรรม</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Shops@index') }}">ร้านหนังสือ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Contact@index') }}">ติดต่อเรา</a></li>
        </ul>
    </div>

    <div>
        <button type="button" class="btn btn-primary" disabled>
            คุณกำลังอยู่ในระบบ
          </button>
    </div>
</nav> 

