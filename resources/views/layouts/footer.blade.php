@push('css')
<style>
    
    footer {
        background: #fff!important;
    }
    @media only screen and (max-width: 600px){
        p {
            font-size: 1rem !important;
        }
    }
</style>
@endpush
<footer id="footer" class="custom-shadow text-center gotham-medium text-md-left pt-4">

    <div class="top-footer-color">
        <div class="container">
            <!--Grid row-->
            <div class="row pt-5 pb-3 d-flex align-items-center">
                <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                    <a class="p-2 m-2 fa-lg fb-ic ml-0" href="https://facebook.com/newreadermagazine"><i class="fab text-black fa-facebook-f mr-lg-4"> </i></a>
                    <a class="p-2 m-2 fa-lg fb-ic ml-0" href="https://twitter.com/newreadermag"><i class="fab text-black fa-twitter mr-lg-4"> </i></a>
                    <a class="p-2 m-2 fa-lg ins-ic" href="https://instagram.com/newreadermagazine"><i class="fab text-black fa-instagram mr-lg-4"> </i></a>
                </div>
            </div>
            <div class="row pt-5 pb-3 d-flex align-items-center">
                <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                <a class="py-2" href="{{ url('/') }}">
                    <img class="" style="width: 150px;" src="{{{ url('storage/logos/NRMag-blacklogo.png') }}}" alt="NRMagazine Logo">
                    <h6 class="pt-3 pl-2 small gotham-medium text-black " style="line-height: 1.2;">
                        New Reader Magazine is a print publication and digital media collective dedicated to finding brave new 
                        voices in art, literature, and culture. We’ve made it our personal mission to shine a light on 
                        underrated and underrepresented voices from all around the world.
                    </h6>
                </a>
                </div>
            </div>
            <!--Grid row-->
        </div>
    </div>

    <!--Footer Links-->
    <div class="container-sm mt-3 mb-4 text-center text-md-left">
        <div class="row mt-5">

            <!--First column-->
            
            <div class="col-md-2 card-deck py-2 mx-0">
                <div class="card-body mx-0 custom-border shadow-lg">
                    <h6 class="text-uppercase gotham-medium"><strong>MENU</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p class="mb-0">
                        <a class="text-black h5 mb-0 gotham-medium" href="{{ url('/') }}" style="line-height: 0.8;">HOME</a>
                    </p>
                    <p class="mb-0">
                        <a class="text-black h5 mb-0 gotham-medium" href="#!" style="line-height: 0.8;">ABOUT</a>
                    </p>
                    <p class="mb-0">
                        <a class="text-black h5 mb-0 gotham-medium text-uppercase" href="{{ url('/marketing-and-partnership') }}" style="line-height: 0.8;">Marketing & Partnership</a>
                    </p>
                    <p class="mb-0">
                        <a class="text-black h5 mb-0 gotham-medium text-uppercase" href="{{ route('terms-conditions') }}" style="line-height: 0.8;">Terms & Conditions</a>
                    </p>
                    <p class="mb-0">
                        <a class="text-black h5 mb-0 gotham-medium text-uppercase" href="{{ route('privacy-policy') }}" style="line-height: 0.8;">Policy</a>
                    </p>
                </div>
            </div>
            <div class="col-md-3 card-deck py-2 mx-0">
                <div class="card-body mx-0 custom-border shadow-lg">
                    <h6 class="text-uppercase gotham-medium"><strong>Contact</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <h6 class="gotham-medium"><i class="fas fa-home mr-2"></i>100 Church Street, Suite 800 New York, NY 10007, USA</h6>
                    <h6 class="gotham-medium"><i class="fas fa-envelope mr-2"></i>contact@newreader<br>magazine.com</h6>
                    <h6 class="gotham-medium"><i class="fas fa-phone mr-2"></i> + 1 800-734-7871</h6>
                </div>
            </div>
            <div class="col-md-4 card-deck py-2 mx-0">
                <div class="card-body mx-0 custom-border shadow-lg">
                    <h6 class="text-uppercase gotham-medium"><strong>OFFICES</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <h6 class="gotham-medium"><i class="fas fa-home mr-2"></i>
                        <b class="text-red gotham-bold">New York</b>, USA 100 Church Street, Suite 800 New York, NY 10007, USA</h6>
                    <h6 class="gotham-medium"><i class="fas fa-home mr-2"></i>
                        <b class="text-red gotham-bold">London</b>, UK 35/37 Ludgate Hill, London EC4M 7JN, United Kingdom</h6>
                    <h6 class="gotham-medium"><i class="fas fa-home mr-2"></i>
                        <b class="text-red gotham-bold">Philippines</b>, Business Park, Cebu 6000, Philippines</h6>
                    <h6 class="gotham-medium"><i class="fas fa-home mr-2"></i>
                        <b class="text-red gotham-bold">Hong Kong</b>, 18 Harbour Road, 35/F Central Plaza, Hong Kong</h6>
                </div>
            </div>
            <div class="col-md-3 card-deck py-2 mx-0 ">
                <div class="card-body mx-0 custom-border newsletter shadow-lg">
                    <h6 class="text-uppercase gotham-medium"><strong>NEWSLETTER</strong></h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Subscribe to our newsletter!</p>
                    <form method="POST" action="">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control subscribe-input" name="email" placeholder="Your email" aria-label="Recipient's email" aria-describedby="MaterialButton-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-md btn-info m-0 px-3" type="submit" id="MaterialButton-addon2"><i class="far fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright pb-5 text-center wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
        <div class="container-fluid">
            Copyright © {{date('Y')}}
            <a class="text-red" href="https://www.newreadermagazine.com/" target="_blank"> {{ config('app.name' )}} </a>
            All Rights Reserved.
        </div>
    </div>

</footer>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v10.0'
            });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="288170518447370">
    </div>
    