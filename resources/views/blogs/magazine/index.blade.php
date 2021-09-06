@extends('layouts.app')
@section('title')New Reader Media's best, most informative blogs on a variety of topics.@endsection
@section('og-title')New Reader Media's best, most informative blogs on a variety of topics.@endsection
@section('meta-description')We find the coolest stuff and curate it for your delectation. We've got a bunch of great topics for the inquiring mind. From haunted houses to SEO techniques. See them here now.@endsection
@section('content')

@push('css')
<style>
    .view .mask {
        padding-top: 50%;
    }
</style>
@endpush

<section data-jarallax data-speed="0.2" class="jarallax mt-2 mb-2">
    <div class="rgba-black-strong" style="height: 600px;">
        <img class="jarallax-img img-fluid" src="{{ asset('storage/blogs/magazine/the-loud-scream.jpg') }}" alt="">
        <div class="container px-3 h-100 d-flex justify-content-start align-items-center">
            <div class="row flex-center">
                <div class="px-sm-0 col-md-12 col-lg-12 text-sm-left text-md-left mt-5 pl-0">
                    <div class=" gotham-bold ml-sm-1 ">
                        <h4 class="mb-sm-4 mb-md-4 ml-md-1 ml-sm-1 text-uppercase text-white">
                            NEW READER MAGAZINE
                        </h4>
                        <div class="col-md-6 pl-1 pr-3">
                            <a href="http://127.0.0.1:8000/blogs/new/reader/magazine/the-loud-scream" class="">
                                <h1 class="text-white text-uppercase blog-title-md mt-md-5 mt-lg-0 font-weight-bold wow fadeIn">
                                    <b class="blog-title-md ml-sm-n1 ml-md-0">THE LOUD SCREAM</b><br>
                                </h1>
                            </a>
                        </div>
                        <a class="btn pink-gradient my-sm-5 my-md-3 text-white btn-rounded font-weight-bold wow fadeIn" href="http://127.0.0.1:8000/blogs/new/reader/magazine/the-loud-scream">Read more
                        </a>
                    </div>
                </div>

                <div class="px-sm-0 col-md-12 col-lg-6 wow fadeIn">
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
<script>
    $('.magazines').owlCarousel({
        // animateOut: 'fadeOut',
        loop:true,
        dots:false,
        margin:10,
        responsiveClass:true,
        responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
    })
</script>
@endpush
@endsection
