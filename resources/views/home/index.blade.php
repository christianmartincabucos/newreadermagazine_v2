@extends('layouts.app')
@section('content')
@push('css')
<style>
    .df-ui-download {
        pointer-events: none !important;
    }
</style>
@endpush
<div class="featured owl-carousel owl-theme nrm-carousel mt-sm-5">

    <div class="item">
        <div class="view">
            <a href="https://www.newreadermagazine.com/">
                <img src="{{ asset('storage/carousel-banner/magazine-banner.jpg') }}" class="img-fluid" alt="placeholder">
            </a>
        </div>
    </div>
    <div class="item">
        <div class="view">
            <a href="{{ url('/marketing-and-partnership') }}">
                <img src="{{ asset('storage/carousel-banner/marketing-banner2.jpg') }}" class="img-fluid" alt="placeholder">
            </a>
        </div>
    </div>
    <div class="item">
        <div class="view">
            <a href="{{ url('/marketing-and-partnership') }}">
                <img src="{{ asset('storage/carousel-banner/marketing-banner3.png') }}" class="img-fluid" alt="placeholder">
            </a>
        </div>
    </div>

</div>

<div class="row mx-0">
    <div class="col-md-9 px-md-1">
        <div class="view overlay">
            <img src="{{ asset('storage/blogs/magazine/the-loud-scream.jpg') }}" class="img-fluid " alt="zoom">
            <div class="mask waves-effect waves-light rgba-black-strong">
                <div class="container px-3 h-100 d-flex justify-content-start align-items-center">
                    <div class="row flex-center">
                        <div class="px-sm-0 col-md-12 col-lg-12 text-sm-left text-md-left mt-5 pl-0">
                            <div class=" gotham-bold ml-sm-1 pl-md-5">
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
        </div>

    </div>
    <div class="col-md-3 px-md-1">
        <div class="card booking-card mt-2 pl-md-0">
            <div class="view overlay">
                <img class="card-img-top" src="{{ asset('storage/blogs/magazine/the-loud-scream.jpg') }}" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="card-body">
                <h4 class="card-title font-weight-bold"><a>THE LOUD SCREAM</a></h4>
                <p class="card-text">
                    Shots ring out from a dilapidated hut in a stinky alley way deep in the slums
                    of Tondo, Manila, simultaneously heard with a loud scream that physically fills the hot humid air.
                </p>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 ml-3 p-2">
        <!--Normal FLipbook-->
        <div class="_df_book" id="df_manual_book" paddingLeft="100" scrollWheel="false" enableDownload="false" height="800" webgl="true" backgroundcolor="#353535" source="{{ asset('pdf/nrm-issue-14.pdf')}}">
        </div>

    </div>
</div>
<section id="features" class="mb-2">

    <!-- Section heading -->
    <h2 class="text-center text-red my-md-5 gotham-bold font-weight-bold wow fadeIn" data-wow-delay="0.2s">
        <strong>NEW READER MAGAZINE</strong>
    </h2>
    <article class="col-md-12">
        <div class="row d-flex justify-content-md-center">
            <div class="col-md-3">
                <img class="" src="https://www.newreadermagazine.com/images/nrm-issue-14.jpg" width="100%" height="auto" style="border:1px solid rgba(0,0,0,0.3);">
            </div>
            <div class="col-md-5 text-center">
                <h1 class="quattro text-red-light mb-5 mt-3 gotham-bold font-weight-bold wow fadeIn">NO FILTER<br><small class="text-black h3"><em>June 2021 | Vol. 4 Issue 14</em></small></h1>
                <p class="text-center h4 text-black gotham font-weight-bold wow fadeIn">This quarter, we're treating you to a fine curation of prose, poetry, and art, all with the common theme of looking at and saying things as they are—no filter.</p>
                <a class="btn pink-gradient mb-sm-2 my-md-5 text-white btn-rounded font-weight-bold wow fadeIn" target="_blank" href="https://www.newreadermagazine.com/download/no-filter">
                    <i class="fas fa-book-open"></i>&nbsp; Read for free
                </a>
            </div>
        </div>
        <div class="row-divider"></div>
    </article>
    <h4 class="mx-sm-2 text-center text-black mb-5 mt-5 gotham-bold font-weight-bolder wow fadeIn" data-wow-delay="0.2s">
        <strong>Our latest issue
            <a href="https://www.newreadermagazine.com/download/no-filter" target="_blank">
                <i class="text-red">NO FILTER</i></a>
            is now available for downloads. You may also get copies of our other issues
            <a href="https://www.newreadermagazine.com/download/no-filter" target="_blank" class="text-red">here</a>
        </strong>
    </h4>
    <div class="container-fluid mt-5">
        <!-- <div class="custom1 owl-carousel owl-theme nrm-carousel">

            <div class="item">
                <a href="https://www.newreadermagazine.com/download" target="_blank">
                    <img src="{{ asset('storage/logos/mag-1.jpg') }}" class="img-fluid">
                </a>
            </div>
            <div class="item">
                <a href="https://www.newreadermagazine.com/download" target="_blank">
                    <img src="{{ asset('storage/logos/mag-2.jpg') }}" class="img-fluid">
                </a>
            </div>
            <div class="item">
                <a href="https://www.newreadermagazine.com/download" target="_blank">
                    <img src="{{ asset('storage/logos/mag-3.jpg') }}" class="img-fluid">
                </a>
            </div>
        </div> -->

</section>
</div>
@push('js')
<script type="text/javascript">
    $(document).ready(function($) {
        $('.featured').owlCarousel({
            animateOut: 'fadeOut',
            items: 1,
            margin: 30,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false,
            stagePadding: 0,
            smartSpeed: 3000
        });

    });
</script>
@endpush
@endsection
