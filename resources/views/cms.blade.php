@extends('_layouts.master')
@section('content')
    @php
        $url = url('assets/frontend/images/course-banner.jpg');
        if(isset($cms) && $cms->cms_banner != ''){
            $url = url(IMAGE_PATH.$cms->cms_banner);
        }
    @endphp
    <div class="vodka-banner panel-space">
        <div class="container-fluid text-center">
            <h1 class="banner-title text-center w-100 mt-5">{{ $cms->banner_title??'' }}</h1>
            <!-- <p class="text-center">A spirit born from obsession and perfected through precision. Every drop of Devil’s
                Juice Vodka embodies balance, smooth yet fierce, refined yet raw. This is where craftsmanship meets
                temptation.</p> -->
        </div>
    </div>
    <div class="bg-black container-fluid ">
        <div class="devider bg-black mb-md-0 mb-4"></div>
    </div>
    <section class="creations panel-space bg-black">
        <div class="container">
            <!-- <h2 class="text-center mb-4">{{ $cms->banner_title??'' }}</h2> -->
            <div class="row g-md-5 g-4">
                <div class="col-lg-12">
                    {!! $cms->description??'' !!}
                </div>
            </div>
        </div>
    </section>

@endsection()