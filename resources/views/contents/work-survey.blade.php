<!-- section content -->
<section>
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">งานสำรวจและอนุรักษ์</h1>
        </div>

        {{-- <div class="row">
            <div class="col">
                <img src="..." class="img-fluid" alt="Responsive image">
            </div>

            <div class="col">
                <h4>Lorem ipsum ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur quibusdam veritatis est ipsa qui, culpa aspernatur iusto et ullam hic! Eos, assumenda. Quaerat maiores velit necessitatibus tempora tempore adipisci ipsam.</p>
            </div>
        </div> --}}

        <div class="row m-3">
            <h3>PHOTO GALLERY</h3>
        </div>

        <?php
            $photo_gallery = [
                "ไทย" => [
                    'thai\\01 คัดเลือกใบลานบนชั้นเก็บคัมภีร์.JPG',
                    'thai\\03 คัดเลือกใบลานบนชั้นเก็บคัมภีร์.JPG',
                    'thai\\05 นำใบลานมาตรวจสอบและคัดเลือก.JPG',
                    'thai\\08 ตรวจสภาพและเนื้อหาในใบลาน.JPG',
                    'thai\\10 ตรวจสภาพและเนื้อหาในใบลาน.jpg',
                    'thai\\2013-10-02_ ยโสธร_ถ่ายใบลาน วัดมหาธาตุ_P_Suwan (329).JPG',
                    'thai\\2014-02-19 to 23_ลำปาง_ถ่ายใบลาน_สกุลพัฒน์ (18).JPG',
                    'thai\\2019_09_9-23_ถ่ายใบลานวัดสระเกศ กทม (169).JPG',
                    'thai\\ลงทะเบียน (41).jpg',
                ],
                "เมียนมาร์" => [
                    'myanmar\\4..jpg',
                    'myanmar\\5..jpg',
                    'myanmar\\6..JPG',
                    'myanmar\\8..JPG',
                    'myanmar\\9..JPG',
                    'myanmar\\10..JPG',
                    'myanmar\\11..JPG',
                    'myanmar\\12..JPG',
                    'myanmar\\13..JPG',
                    'myanmar\\14..JPG',
                    'myanmar\\15.JPG',
                    'myanmar\\16..JPG',
                ],
                "ศรีลังกา" => [
                    'srilanka\\2013-12 National Archive (006).jpg',
                    'srilanka\\2013-12 National Archive (007).jpg',
                    'srilanka\\2014-02-25_ศรีลังกา_ถ่ายใบลาน_พี่สุวรรณ (84).JPG',
                    'srilanka\\2014-02-25_ศรีลังกา_ถ่ายใบลาน_พี่สุวรรณ (235).JPG',
                    'srilanka\\2014-02-25_ศรีลังกา_ถ่ายใบลาน_พี่สุวรรณ (320).JPG',
                    'srilanka\\2014-02-26_ศรีลังกา_ถ่ายใบลาน_พี่สุวรรณ (211).JPG',
                    'srilanka\\2014-02-26_ศรีลังกา_ถ่ายใบลาน_พี่สุวรรณ (306).JPG',
                    'srilanka\\2015_12_30-5_ศรีลังกา_นาย (180).JPG',
                    'srilanka\\2015_12_30-5_ศรีลังกา_นาย (282).JPG',
                ],
                "ลาว" => [
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (25).JPG',
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (26).JPG',
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (61).JPG',
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (64).JPG',
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (68).JPG',
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (73).JPG',
                    'laos\\2014-11-08_สปปลาว_ประมวลถ่ายใบลาน_สกุลพัฒน์ (74).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (82).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (90).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (91).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (92).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (152).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (206).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (335).JPG',
                    'laos\\2014-11-13_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (339).JPG',
                    'laos\\2014-11-14_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (29).JPG',
                    'laos\\2014-11-14_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (32).JPG',
                    'laos\\2014-11-14_สปปลาว_ถ่ายใบลาน_สกุลพัฒน์ (84).JPG',
                ],
            ]
        ?>

        <div class="row">
            <div class="col">
                {{-- pos --}}
                <ul class="nav nav-tabs nav justify-content-center" id="work-survey-h" role="tablist">
                    @foreach ($photo_gallery as $pos => $photo)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="{{ $pos }}-tab" data-toggle="tab" href="#{{ $pos }}" role="tab" aria-controls="{{ $pos }}" aria-selected="fales">{{ $pos }}</a>
                        </li>
                    @endforeach
                </ul>
                {{-- photo --}}
                <div class="tab-content" id="work-survey-b">
                    <?php $flag = true ?>
                    @foreach ($photo_gallery as $pos => $photo)
                        <div class="tab-pane fade @if ($flag) show active <?php $flag = false ?> @endif" id="{{ $pos }}" role="tabpanel" aria-labelledby="{{ $pos }}-tab">
                            <div class="d-flex flex-wrap justify-content-around">
                                @foreach ($photo as $t)
                                    <div class="col-md-4 col-sm-6 align-self-center">
                                        <img src="..\img\servey\{{ $t }}" alt="{{ $t }}" width="100%" class="shadow-lg rounded-lg m-3">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    


</section>