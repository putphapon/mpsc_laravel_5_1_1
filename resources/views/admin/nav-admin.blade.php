<!-- nav -->
<nav class="navbar fixed-top navbar-expand-xl">
    <a class="navbar-brand text-uppercase h1" href="/admin">
        <img src="/img/logo/logo-mpsc.png" alt="Manuscript Preservation and Study Center">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="ture" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-uppercase">
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Title@index') }}">หน้าหลัก</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\About@index') }}">เกี่ยวกับ</a></li>     --}}
            <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Database@index') }}">ฐานข้อมูล</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Scholar@index') }}">บทความวิชาการ/งานวิจัย</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Manuscripts@index') }}">ธารความรู้</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\VDO@index') }}">สื่อ VDO</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Events@index') }}">กิจกรรม</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Shops@index') }}">ร้านหนังสือ</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action('Admin\Contact@index') }}">ติดต่อเรา</a></li> --}}
        </ul>
    </div>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        {{-- @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> 
                </div>
            </li>
        @endguest --}}
    </ul>
</nav>

