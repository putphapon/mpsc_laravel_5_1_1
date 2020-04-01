<!-- section content -->
<section>
    <div class="container">
        <div class="row">
            <h1 class="headerTitle">วัตถุประสงค์/การดำเนินงาน</h1>
        </div>
    
        @foreach ($about_objective as $item)
        <div class="row">
            <div class="col WYSIWYGtext">
                <h3 class="bg-light p-4">{{ $item->about_objective_subject}}</h3>
                <p>
                    {!! $item->about_objective_detail !!}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    </section>