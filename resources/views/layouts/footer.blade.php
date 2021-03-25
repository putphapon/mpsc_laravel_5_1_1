<!-- footer-->
<section id="footer">
    <div class="container-xl">
        <div class="p-1 bg-secondary"></div>
        <div class="row pt-5">
            <!-- site map-->
            <div class="col-md-4 col-sm-12">
                <p class="font-weight-bold text-uppercase">site map</p>
                <div class="p-3 mb-5 rounded">
                    <ul class="list-unstyled">
                        <li><a class="text-decoration-none" href="/">หน้าหลัก</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\About@index') }}">เกี่ยวกับ</a></li>
                        <li><a class="text-decoration-none" href="{{ action('Home\Work@index') }}">งาน</a></li>
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
                    @foreach ($contact as $item)
                    <p class="font-weight-bolder"><i class="fa fa-address-card"></i><br>
                        {{  $item->contact_name }}</p>

                    <p><i class="fa fa-map-marker-alt"></i><br>
                        {{  $item->contact_address }}</p>

                    <p><i class="fa fa-phone-alt"></i><br>
                        {{  $item->contact_phone }}</p>
                    @endforeach
                </div>
            </div>

            <!-- img -->
            <div class="col-md-4 col-sm-12 d-flex flex-row-reverse">
                <img src="..\img\item-footer-2.png" alt="" class="align-self-end m-0 mb-5 p-0" style="max-height:40vh">
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-9 coll-sm-12">
                
            {{-- sponsor --}}
            <?php
                $sponsor = [
                    '1. มูลนิธิธรรมชัย.png',
                    '2. DTP.png',
                    '3. SAT_Tokyo.png',
                    '4. Hsuan Chuang University  Taiwan.png',
                    '5. Myanmar@SPSU (Yangon).png',
                    '6. Myanmar@SPSU (Mandalay).png',
                    '7. Myanmar@ITBMU.png',
                    '8. King\'s College London.png',
                    '9. Tango University (Bhutan).png',
                    '10. Nanhua University.png',
                    '11. กัมพูชา.png',
                ]
            ?>
                <div class="d-flex flex-wrap justify-content-around">
                    @foreach ($sponsor as $s)
                        <img src="..\img\sponsor\{{ $s }}" alt="" srcset="" height="50">
                    @endforeach
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <!-- copyrigth -->
                <div class="d-flex justify-content-between flex-column mt-2">
                    {{-- admin --}}
                    <div class="m-1">
                        <a href="/auth/login" class="btn btn-outline-dark btn-sm"  role="button">เข้าสู่ระบบ</a>
                    </div>
        
                    {{-- copyright --}}
                    <p class="h6 m-1">
                        <i class="fa fa-copyright"></i>
                        {{ date("Y") }} - {{ date("Y")+1 }}  All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    
        

</section>
{{-- img --}}
<div class="m-0 p-0 overflow-hidden" style="width:100vw;height:auto;">
    <img src="..\img\item-footer.png" alt="" class="ml-n5 mr-n5 mb-n3 pl-n5 pr-n5 pb-n4 h-auto" style="width:120%;">
</div>