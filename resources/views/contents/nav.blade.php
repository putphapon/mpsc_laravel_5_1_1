<!-- nav -->
<nav class="navbar fixed-top navbar-expand-xl">
    <a class="navbar-brand text-uppercase h1" href="/">
        <img src="/img/logo/logo-mpsc.png" alt="Manuscript Preservation and Study Center">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="ture" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase">
            <li class="nav-item"><a class="nav-link" href="/">หน้าหลัก</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ action('HomeAbout@index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เกี่ยวกับ</a>
                <div class="dropdown-menu" aria-labelledby="about">
                    <a class="dropdown-item bg-transparent" href="{{ action('HomeAboutObjective@index') }}">วัตถุประสงค์/การดำเนินงาน</a>
                    <a class="dropdown-item bg-transparent" href="{{ action('HomeAboutBoard@index') }}">คณะที่ปรึกษา</a>
                </div>
            </li>
    
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeDatabase@index') }}">ฐานข้อมูล</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeScholar@index') }}">บทความวิชาการ/งานวิจัย</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeManuscripts@index') }}">ธารความรู้</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeVdo@index') }}">สื่อ VDO</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeEvents@index') }}">กิจกรรม</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeShops@index') }}">ร้านหนังสือ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action('HomeContact@index') }}">ติดต่อเรา</a></li>
        </ul>

        <div class="btn-group"style="width: 250px";>
            <button type="button" class="btn btn-outline-light dropdown-toggle btn-block" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                ค้นหา
            </button>
            <div class="dropdown-menu">
                <script async src="https://cse.google.com/cse.js?cx=008341805127915127433:42dxa5yxayl"></script>
                <div class="gcse-search"></div>
            </div>
        </div>
        
    </div>
</nav>