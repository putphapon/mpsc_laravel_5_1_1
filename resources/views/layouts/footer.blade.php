<!-- footer--> 
<section id="footer">
    <div class="container">        
        <div class="row pt-5">
            <!-- site map-->
            <div class="col-md-4 col-sm-12">
                <p class="font-weight-bold text-uppercase">site map</p>
                <div class="p-3 mb-5 rounded">
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none" href="/">หน้าหลัก</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\About@index') }}">เกี่ยวกับ</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Database@index') }}">ฐานข้อมูล</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Scholar@index') }}">บทความวิชาการ/งานวิจัย</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Manuscripts@index') }}">ธารความรู้</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\VDO@index') }}">สื่อ VDO</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Events@index') }}">กิจกรรม</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Shops@index') }}">ร้านหนังสือ</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Contact@index') }}">ติดต่อเรา</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- contact -->
            <div class="col-md-4 col-sm-12">
                <p class="font-weight-bold text-uppercase">contact us</p>
                
                <div class="p-3 mb-5 rounded">
                    <p class="font-weight-bolder"><i class="fa fa-address-card"></i><br>
                    กลุ่มอนุรักษ์และศึกษา<br>คัมภีร์พระไตรปิฎกใบลาน (MPSC)</p>

                    <p><i class="fa fa-map-marker-alt"></i><br>
                    75-76 หมู่ 1 ต.ไทรน้อย อ.บางบาล จ.พระนครศรีอยุธยา 13250 </p>

                    <p><i class="fa fa-phone-alt"></i><br>
                    โทร 02-8377600 ต่อ 13670</p>
                </div>
            </div>

            <!-- other -->
            <div class="col-md-4 col-sm-12">
            </div>

        </div>



    <!-- copyrigth -->
    <div class="d-flex justify-content-center flex-column pb-3">
        <p class="h6">
            <i class="fa fa-copyright"></i>
            {{ date("Y") }} - {{ date("Y")+1 }}  All Rights Reserved
        </p>

        <div>
            <a href="/auth/login" class="btn btn-outline-dark btn-sm"  role="button">เข้าสู่ระบบ</a>
        </div>
    </div>
</section>