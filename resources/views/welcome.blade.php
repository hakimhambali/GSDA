<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>TVET EXTENDED REALITY</title>
        <title>Future Classroom with MagicX</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">

        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon" href="{{ URL::asset('TVETXR.ico') }}" type="image/x-icon">

        <style>
            body {
                font-family: 'Nunito';
                background-color: #007bff;
            }
            .pointer {cursor: pointer;}
        </style>
        @include('partials.login')
        @include('partials.register')
    </head>
    <body>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><img height="30px" width="30px" src="https://img.icons8.com/carbon-copy/100/000000/up.png"/></button>
            <div class="fullscreen">

                      <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/gsda2.png')}}" height="60px" width="160px" alt="TVETXR" float="left"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="oi oi-menu"></span> Menu
                                </button>

                          <div class="collapse navbar-collapse" id="ftco-nav">
                            @if (Route::has('login'))
                            <ul class="navbar-nav ml-auto">
                                @auth
                              <li class="nav-item active"><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 font-weight-bold">Dashboard</a></li>
                              @else
                              <li class="nav-item "><a class="nav-link " style="cursor: pointer" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a></li>
                              <!-- <li class="nav-item "><a href="{{ route('login') }}" >Login</a></li> -->
                              @if (Route::has('register'))
                              <li class="nav-item "><a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#registerModal">{{ __('Register') }}</a></li>
                              <!-- <li class="nav-item"><a href="{{ route('register') }}" class="ml-4 text-sm text-info font-weight-bold">Register</a></li> -->
                              <!-- <li class="nav-item"><a href="{{ route('register') }}" class="nav-link" style="cursor: pointer">{{ __('Register') }}</a></li> -->
                              @endif

                            </ul>
                                @endif
                          </div>
                                @endif
                        </div>
                      </nav>
                    <!-- END nav -->

                    <section>
                    <div class="hero-wrap js-fullheight overlay">
                        <div class="overlay">
                            <div class="container-fluid px-0">
                                    <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-start">
                                        {{-- <img class="col-7 h-75 ml-4 mb-5 p-4 mw-100 js-fullheight align-self-end order-md-first" src="{{asset('img/ManInVRrmvbg.png')}}" alt=""> --}}
                                        <img class="one-third js-fullheight align-self-end order-md-first img-fluid" src="images/undraw_co-working_825n.svg" alt="">

                                            <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
                                                <div class="text mt-5">
                                                    <span class="subheading ">Interactive Learning</span>
                                                    <h1 class="mb-3"><span>GAMIFICATION FOR</span> <span>SOFTWARE</span> <span>DESIGN ARCHITECTURE</span> <span>(GSDA)</span></h1>
                                                    <p>We present to you the place that is able to make your learning more fun !</p>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </section>

                      <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
                          <div class="container">
                              <div class="row justify-content-center">
                                  <div class="col-lg-10 ">
                                      <div class="intro">
                                          <div class="row">
                                              <div class="col-md-8">
                                                  <h3>What is GSDA ?</h3>
                                                  <p>The gamification for Software Design Architecture Course (GSDA) is an
                                                    alternative way of studying Software Design Architecture(SDA) course. The aim of
                                                    this gamification is to ease the teaching and learning for SDA course.</p>
                                              </div>
                                              <div class="col-md-4 d-flex align-items-center justify-content-center">
                                                    <a class="btn bg-primary px-4 py-3 text-white" style="cursor: pointer" data-toggle="modal" data-target="#loginModal">{{ __('Join Us Now') }}</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>

                    <section class="ftco-section services-section bg-light">
                        <div class="container">
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-8 text-center heading-section ftco-animate">
                                    <h2 class="mb-3">Enhance Your Learning by Playing Games and Many More !</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 py-5 d-flex align-items-center">
                                    <img src="img/virtualrealityrmvbg.png" class="img-fluid " alt="Virtual Reality">
                                    <!-- <a href="https://www.vecteezy.com/free-vector/simulation">Simulation Vectors by Vecteezy</a> -->
                                </div>
                                <div class="col-lg-6 py-5">
                                    <div class="row">
                                        <div class="col-md-12 ftco-animate d-flex">
                                            <div class="media block-6 bg-light border d-flex p-2 mb-3 hover-shadow">
                                                <div class="media-body pl-4">
                                                    <h3 class="heading font-weight-bold">Quiz</h3>
                                                    <p class="mb-0 text-dark">- Lecturers can create quiz while students can answer the quiz. Users can monitor students' grades.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 ftco-animate d-flex">
                                            <div class="media block-6 bg-light border d-flex p-2 mb-3 hover-shadow">
                                                <div class="media-body pl-4">
                                                    <h3 class="heading font-weight-bold">Challenger</h3>
                                                    <p class="mb-0 text-dark">- Students can challenge other students to test their knowledge in a fun way.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 ftco-animate d-flex">
                                            <div class="media block-6 bg-light border d-flex p-2 mb-3 hover-shadow">
                                                <div class="media-body pl-4">
                                                    <h3 class="heading font-weight-bold">Leaderboards</h3>
                                                    <p class="mb-0 text-dark">- Users can see students' rankings in the leaderboards. The leaderboards are ranked by batch.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
{{-- 
                <section class="ftco-section ftco-no-pt ftco-no-pb bg-white">
                    <div class="container ftco-animate">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="intro border border-secondary rounded ">
                                    <div class="row text-dark">
                                        <div class="col-md-auto">
                                            <h3>Instructor</h3>
                                            <ul>
                                                <li>Create your own personalize course</li>
                                                <li>Design the 3D model and upload </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-auto">
                                            <h3>Student</h3>
                                            <ul>
                                                <li>Without any complex setting, browse the TVET XR WEB and it is ready to be used</li>
                                                <li>Plug your own head-mounted device or just use the smartphone as usual</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ftco-section bg-white">
                    <div class="container">
                        <div class="row justify-content-center mb-5 pb-3">
                            <div class="col-md-7 text-center heading-section ftco-animate">
                                <h2>Who We Are</h2>
                                <p class="border-top">We are Media and Game Innovation Centre of Excellence (MaGICX) Universiti Teknologi Malaysia Working
                                    with Center for Instructor and Advanced Skill Training (CIAST) </p>
                                <h5 class="border-bottom font-weight-bold mt-5">Presenting TVET XR</h5>
                            </div>
                        </div>
                        <div class="d-flex ftco-animate justify-content-center align-items-center ">
                            <div class="mr-5"><img src="img/magicxrmvbg.png" alt="MaGICX"></div>
                            <div class="ml-5"><img class="image-size" src="img/ciastlogo.png" alt="CIAST"></div>

                        </div>
                    </div>
                </section>

                <section class="ftco-section services-section bg-light">
                      <div class="container">
                          <div class="row justify-content-center mb-5">
                          <div class="col-md-8 text-center heading-section ftco-animate">
                            <h2 class="mb-3 border-bottom">MaGICX Services</h2>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-md-6 d-flex align-self-stretch ftco-animate pointer">
                            <div class="media block-6 services d-flex">
                              <div class="media-body pl-4">
                                <h3 class="heading">Augmented Reality</h3>
                                <p class="mb-0">Augmented Reality creates a new and innovative way to inegrate technology into the real world to build new and exciting interactive experiences.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6 d-flex align-self-stretch ftco-animate pointer">
                            <div class="media block-6 services d-flex">
                              <div class="media-body pl-4">
                                <h3 class="heading">Virtual Reality</h3>
                                <p class="mb-0">We are able to create interactive three-dimensional, computer generated environment which creates an immersive experiences for users.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6 d-flex align-self-stretch ftco-animate pointer">
                            <div class="media block-6 services d-flex">
                              <div class="media-body pl-4">
                                <h3 class="heading">Mobile & Web App Development</h3>
                                <p>We can develop beautiful and functional mobile & web applications and deliver the best solution for your business needs.</p>
                              </div>
                            </div>
                          </div>
                                    <div class="col-lg-4 col-md-6 d-flex align-self-stretch ftco-animate pointer">
                            <div class="media block-6 services d-flex">
                              <div class="media-body pl-4">
                                <h3 class="heading">Training & Learning Programme</h3>
                                <p>We provide various training courses that focuses on games development, mobile & web development and Augmented Reality development which varies from juniour to professional level.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6 d-flex align-self-stretch ftco-animate pointer">
                            <div class="media block-6 services d-flex">
                              <div class="media-body pl-4">
                                <h3 class="heading">MaGICXcel Incubator Centres</h3>
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6 d-flex align-self-stretch ftco-animate pointer">
                            <div class="media block-6 services d-flex">
                              <div class="media-body pl-4">
                                <h3 class="heading">Game & Gamification</h3>
                                <p>We are able to develop applications that uses the concept of game mechanics and game design techniques to engage and motivate people to achieve their goals.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section> --}}

                    {{-- <section class="ftco-section bg-white">
                      <div class="container">
                        <div class="row justify-content-center mb-5 pb-3">
                          <div class="col-md-7 text-center heading-section ftco-animate">
                            <h2>Equipments</h2>
                            <p class="border-t">Virtual Reality Headset & Smartphones for Augmented Reality</p>
                          </div>
                        </div>

                        <div class="row border-gray-200 text-center">
                            <div class="col-4">
                                <img class="w-100 hover-shadow"  src="{{asset('/img/oculusquestrmvbg.png')}}" alt="Oculus Quest">
                                <p class="mt-2"><b>Oculus Quest</b></p>
                            </div>
                              <div class="col-4">
                                  <img class="w-70 hover-shadow"  src="{{asset('/img/magicleap.png')}}" alt="Smartphone" >
                                  <p class="mt-1"><b>Magic Leap</b></p>
                              </div>
                              <div class="col-4">
                                  <img class="w-115 hover-shadow"  src="{{asset('/img/oculusriftrmvbg.png')}}" alt="Oculus Rift S">
                                  <p class="mt-2"><b>Oculus Rift S</b></p>
                              </div>
                        </div>
                      </div>
                    </section> --}}

                    {{-- <section class="ftco-section bg-light">
                      <div class="container">
                        <div class="row justify-content-center mb-5 pb-3">
                          <div class="col-md-7 text-center heading-section ftco-animate">
                            <h2>Virtual Reality Activities</h2>
                            <p>Experience the world of VR</p>
                          </div>
                        </div>

                        <div class="row text-center">

                            <div class="bg-image hover-zoom col-6">
                                  <img src="{{asset('/img/VR01.jpg')}}" class="w-75" />

                            </div>

                            <div class="bg-image hover-zoom col-6">
                                  <img src="{{asset('/img/VR02.jpg')}}" class="w-75" />
                            </div>

                        </div>

                      </div>
                    </section> --}}

<!-- Footer -->
                                <footer class="ftco-footer ftco-section">
                                    <div class="container">
                                        <div class="row mb-5">
                                            <div class="col-md">
                                                <div class="ftco-footer-widget mb-4">
                                                    <h2 class="ftco-heading-2">About Us</h2>
                                                    <p>Founded by Muhammad Hakim Bin Md Hambali. Currently, student of Bachelor of Computer Science (Software Engineering) in Universiti Teknologi Malaysia</p>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="ftco-footer-widget mb-4">
                                                    <h2 class="ftco-heading-2">Contact</h2>
                                                    <div class="block-23 mb-3">
                                                        <ul>
                                                            <li><span class="mr-3 fa fa-map-marker"></span><span class="text">Universiti Teknologi Malaysia, 81310 Johor Bahru, Johor</span></li>
                                                            <li><span class="mr-3 fa fa-phone"></span><span class="text">+012 742 0124</span></a></li>
                                                            <li><span class="mr-3 fa fa-envelope"></span><span class="text">hakimhambali77@gmail.com</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center justify-center ">
                                                <ul class="ftco-footer-social list-unstyled mb-0 mx-auto">
                                                    <li class="ftco-animate"><a href="https://twitter.com/hakimhambali1"><span class="fa fa-twitter"></span></a></li>
                                                    <li class="ftco-animate"><a href="https://www.facebook.com/prince.dota.71"><span class="fa fa-facebook"></span></a></li>
                                                    <li class="ftco-animate"><a href="https://www.instagram.com/hakimhambali"><span class="fa fa-instagram"></span></a></li>
                                                    {{-- <li class="ftco-animate"><a href="{{'https://www.facebook.com/hakim'. 'hambali/'.''}}"><span class="fa fa-facebook"></span></a></li> --}}
                                                    {{-- <img src="{{'http://161.139.23.150:8080/ipfs/'.$resourcesfile->link_thumbnail.''}}" alt="Image Preview" style="width:480px;height:200px;"> --}}
                                                </ul>
                                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                                    &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <!--| Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
                                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                            </div>
                                        </div>
                                    </div>
                                </footer>

                                <!-- <a href="https://icons8.com/icon/115871/up">Up icon by Icons8</a> -->
                  <!-- loader -->
                  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

                  <script src="js/jquery.min.js"></script>
                  <script src="js/jquery-migrate-3.0.1.min.js"></script>
                  <script src="js/popper.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
                  <script src="js/google-map.js"></script>
                  <script src="js/jquery.easing.1.3.js"></script>
                  <script src="js/jquery.waypoints.min.js"></script>
                  <script src="js/jquery.stellar.min.js"></script>
                  <script src="js/owl.carousel.min.js"></script>
                  <script src="js/jquery.magnific-popup.min.js"></script>
                  <script src="js/jquery.animateNumber.min.js"></script>
                  <script src="js/scrollax.min.js"></script>
                  <script src="js/main.js"></script>
                  <!-- MDB --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"></script>
                  @yield('scripts')
    </body>
</html>
