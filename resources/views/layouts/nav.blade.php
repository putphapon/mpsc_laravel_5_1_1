<div class="container">
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
                    <a class="nav-link dropdown-toggle" href="{{ action('Home\About@index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เกี่ยวกับ</a>
                    <div class="dropdown-menu" aria-labelledby="about">
                        <a class="dropdown-item bg-transparent" href="{{ action('Home\AboutObjective@index') }}">วัตถุประสงค์/การดำเนินงาน</a>
                        <a class="dropdown-item bg-transparent" href="{{ action('Home\AboutBoard@index') }}">คณะที่ปรึกษา</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ action('Home\Work@index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">งาน</a>
                    <div class="dropdown-menu" aria-labelledby="work">
                        <a class="dropdown-item bg-transparent" href="{{ action('Home\WorkSurvey@index') }}">งานสำรวจและอนุรักษ์</a>
                        <a class="dropdown-item bg-transparent" href="{{ action('Home\WorkExchange@index') }}">งานปริวรรตอักษร</a>
                        <a class="dropdown-item bg-transparent" href="{{ action('Home\WorkDev@index') }}">งานพัฒนาโปรแกรม</a>
                        <a class="dropdown-item bg-transparent" href="{{ action('Home\WorkCollab@index') }}">งานด้านความร่วมมือ</a>
                    </div>
                </li>
        
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\Database@index') }}">ฐานข้อมูล</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\Scholar@index') }}">บทความวิชาการ/งานวิจัย</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\Manuscripts@index') }}">ธารความรู้</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\VDO@index') }}">สื่อ VDO</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\Events@index') }}">กิจกรรม</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\Shops@index') }}">ร้านหนังสือ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('Home\Contact@index') }}">ติดต่อเรา</a></li>
            </ul>
    
            {{-- <div class="btn-group"style="width: 250px";>
                <button type="button" class="btn btn-outline-light dropdown-toggle btn-block" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    ค้นหา
                </button>
                <div class="dropdown-menu">
                    <div class="gcse-search"></div>
                </div>
            </div> --}}
    
            <form class="form-inline my-2 my-lg-0"  action="{{ action('Home\ManuscriptsBlogTag@store') }}" method="post">
                <div class="input-group">
                    {{-- POST --}}
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    {{-- input --}}
                    <input class="form-control" type="search" aria-label="Search" name="search" >
                    
                    {{-- submit --}}
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" value="Submit">ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>