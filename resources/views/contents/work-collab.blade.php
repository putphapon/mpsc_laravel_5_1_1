<!-- section content -->
<section>
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">งานด้านความร่วมมือ</h1>
        </div>
    </div>

    <div class="row m-3">
        <h3>PHOTO GALLERY</h3>
    </div>

    <?php
        $photo_gallery = [
            "เมียนมาร์" => [
                'myanmar\\MOU พม่า.JPG',
                'myanmar\\MOU พม่า2.JPG',
                'myanmar\\MOU พม่า3.JPG',
                'myanmar\\MOU พม่า4.JPG',
            ],
            "ศรีลังกา" => [
                'srilanka\\MOU SIBA ศรีลังกา (1).JPG',
                'srilanka\\MOU SIBA ศรีลังกา (2).JPG',
                ],
            "ลาว" => [
                'laos\\2016_02_23-26_จัดตั้งศูนย์ประสานงานลาว (154).JPG',
                'laos\\2016_02_23-26_จัดตั้งศูนย์ประสานงานลาว (183).JPG',
                'laos\\MOU Laos (1).JPG',
                'laos\\MOU Laos (2).JPG',
                ],
        ]
    ?>

    <div class="row">
        <div class="col">
            {{-- pos --}}
            <ul class="nav nav-tabs nav justify-content-center" id="work-collab-h" role="tablist">
                @foreach ($photo_gallery as $pos => $photo)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="{{ $pos }}-tab" data-toggle="tab" href="#{{ $pos }}" role="tab" aria-controls="{{ $pos }}" aria-selected="fales">{{ $pos }}</a>
                    </li>
                @endforeach
            </ul>
            {{-- photo --}}
            <div class="tab-content" id="work-collab-b">
                <?php $flag = true ?>
                @foreach ($photo_gallery as $pos => $photo)
                    <div class="tab-pane fade @if ($flag) show active <?php $flag = false ?> @endif" id="{{ $pos }}" role="tabpanel" aria-labelledby="{{ $pos }}-tab">
                        <div class="d-flex flex-wrap justify-content-around">
                            @foreach ($photo as $t)
                                <div class="col-md-4 col-sm-6 align-self-center">
                                    <img src="..\img\collab\{{ $t }}" alt="{{ $t }}" width="100%" class="shadow-lg rounded-lg m-3">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>


</section>