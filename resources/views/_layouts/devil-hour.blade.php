@php
    use App\Models\Centralweb_model;
    use App\Models\Common_model;

    $centralwebmodel = new Centralweb_model;
    $commonmodel = new Common_model;

    $devilHourList = $centralwebmodel->get_devil_hour();
    $content = $commonmodel->getOneRecord('tbl_home_content',['id'=>1]);
@endphp
<section class="panel-space devils-hour">
    <h2 class="h2-heading text-center mb-4 weight-600">{{ $content->sec5_title }}</h2>
    <p class="w-50 text-center mx-auto mb-5 pb-lg-5">{{ $content->sec5_description }}</p>

    <div class="container-fluid">
        <div class="row g-4">
            @if($devilHourList->isNotEmpty())
            @foreach($devilHourList as $list)
            
            <div class="col-md-4">
                <div class="devils-hour-profile">
                    <img src="{{ asset(IMAGE_PATH.$list->image) }}" alt="{{ $list->cocktail_name }}" class="w-100">
                </div>
                <a class="text-decoration-none text-white" href="{{ $list->insta_link }}" target="blank"><small>{{ $list->insta_username }}</small> </a>
            </div>
           
            @endforeach
            @endif
            <?php /* <div class="col-md-4">
                <div class="devils-hour-profile">
                    <img src="{{ asset('assets/frontend/images/devil2.jpg') }}" alt="devil1" class="w-100">
                </div>
                <small>Ammy, @ammy_23 </small>
            </div>
            <div class="col-md-4">
                <div class="devils-hour-profile">
                    <img src="{{ asset('assets/frontend/images/devil3.jpg') }}" alt="devil1" class="w-100">
                </div>
                <small>Ammy, @ammy_23 </small>
            </div> */ ?>
        </div>
    </div>
</section>