<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/logoMain2.png') }}">
        <title>{{ config('app.name', 'E-Learning') }}</title>

         <!-- Fonts -->
         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

         <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 
         @livewireStyles
 
         <!-- Scripts -->
         <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ url('css/plugins/colors/default.css') }}" id="theme" rel="stylesheet">
        <link href="{{ url('css/plugins/style.css') }}" rel="stylesheet">

        <link href="{{ url('css/plugins/icons/MaterialDesign-Webfont-master/css/materialdesignicons.min.css') }}" rel="stylesheet">

        

        <!-- Select2 -->
        <link href="{{ url('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- User Card -->
        <link href="{{ url('css/plugins/pages/user-card.css')}}" rel="stylesheet">

        <!-- Popup CSS -->
        <link href="{{ url('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">

        <style>
          
                .zoom {
                    padding: 0px;
                    transition: transform .1s; /* Animation */
                    margin: 0 auto;
                }
                
                .zoom:hover {
                    transform: scale(1.01); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                }
    
                .zoom2 {
                    padding: 0px;
                    transition: transform .1s; /* Animation */
                    margin: 0 auto;
                }
                
                .zoom2:hover {
                    transform: scale(1.07); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                }
    
      </style>
    
        @stack('styles')
    </head>

    
        <body class="fix-header fix-sidebar card-no-border">
            <!-- ============================================================== -->
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar">
                    <nav class="navbar top-navbar navbar-expand-md ">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{URL::to('dashboard')}}">
                                <!-- Logo text -->
                                <span>
                                 <!-- dark Logo text -->
                                 <img src="{{ url('img/gsda2.png') }}" alt="homepage" class="dark-logo" style="width:80%;height:100%;display: inline;" />
                                </span> 
                            </a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse">
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu" style="color:#67757c"></i></a> </li>
                                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu" style="color:#67757c"></i></a> </li>
                            </ul>

                            <ul class="navbar-nav my-lg-0">
        
                                <!-- ============================================================== -->
                                <!-- Include Livewire -->
                                <!-- ============================================================== -->
                                @livewire('navigation-dropdown')
                              
        
                                <!-- ============================================================== -->
                                <!-- Logout -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">

                                    <!-- Authentication -->
                                    <form id="logout" method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    </form>

                                        <a class="nav-link dropdown-toggle waves-effect waves-dark" onclick="event.preventDefault(); $('#logout').submit();"> 
                                            <i class="mdi mdi-logout"></i>
                                        </a>

                                </li>
                                <!-- ============================================================== -->
                                <!-- End Logout -->
                                <!-- ============================================================== -->
                                
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
           
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li class="user-profile"> 
                                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                        <table>
                                            <tr>
                                                <td><img src="{{auth()->user()->profile_photo_url}}" alt="user" style="display: inline;"/></td>
                                                <td><span class="hide-menu">{{auth()->user()->name}} <br> <small class="font-weight-bold">{{strtoupper(auth()->user()->role)}}</small></span></td>
                                            </tr>
                                        </table>
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{URL::to('/user/profile')}}">Profile </a></li>
                                        <li><a href="{{URL::to('/user/api-tokens')}}">API Token</a></li>
                                        <li><a href="#" onclick="event.preventDefault(); $('#logout').submit();">Logout</a></li>
                                    </ul>
                                </li>
                                <li class="nav-devider"></li>
                                <li> <a class="waves-effect waves-dark" href="{{URL::to('dashboard')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home </span></a>
                                    
                                </li>

                                {{-------- START SECTION - ADMINISTRATION --------}}
                                @if (auth()->user()->role == 'admin')
                                    <li class="nav-small-cap">ADMINISTRATION</li>

                                    <li> <a class="waves-effect waves-dark" href="{{URL::to('user')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users </span></a>
                                        
                                    </li>

                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Topics </span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        
            
                                            <li><a href="{{URL::to('course')}}">Create New Topics</a></li>
                                        
                                    
                                            {{-- <li><a href="{{URL::to('coursefile')}}">Add Quizzes to Topic</a></li> --}}
                                            <li><a href="{{URL::to('createquiz')}}">Add Quizzes to Topic</a></li>
                                        
                                        </ul>
                                    </li> 

                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Classes </span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        
            
                                            <li><a href="{{URL::to('class')}}">Create New Class</a></li>
                                        
                                    
                                            <li><a href="{{URL::to('classcourse')}}">Add Topic to Class</a></li>
                                        
                                        </ul>
                                    </li>

                                   
                                @endif
                                {{-------- END SECTION - ADMINISTRATION --------}}

                                {{-------- START SECTION - LECTURER --------}}
                                @if (auth()->user()->role == 'lecturer')
                                    <li class="nav-small-cap">E-LEARN</li>
                                    <li> <a class="waves-effect waves-dark" href="{{URL::to('myclass')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">My Class</span></a>
                                    
                                    </li>

                                    <li class="nav-small-cap">MANAGE</li>

                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Topics </span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        

                                            <li><a href="{{URL::to('course')}}">Create New Topics</a></li>
                                        
                                    
                                            {{-- <li><a href="{{URL::to('coursefile')}}">Add QuizzesCF to Topic</a></li> --}}

                                            
                                            <li><a href="{{URL::to('createquiz')}}">Add Quizzes to Topic</a></li>

                                            
                                            {{-- <li><a href="{{URL::to('attemptquiz')}}">Attempt Quizzes</a></li> --}}
                                            {{-- <li><a href="{{URL::to('result')}}">Students' Result</a></li> --}}
                                        </ul>
                                    </li>

                                   

                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Classes </span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        

                                            {{-- <li><a href="{{URL::to('class')}}">Create New Class</a></li> --}}
                                            {{-- <li><a href="{{URL::to('teams/create')}}">Create New Class</a></li> --}}
                                        
                                            <li><a href="{{URL::to('classcourse')}}">Add Topic to Class</a></li>
                                           
                                
                                            @if (auth()->user()->current_team_id)
                                                @if (Auth::user()->currentTeam)
                                                    <li><a href={{ route('teams.show', Auth::user()->currentTeam->id) }}>Class Setting</a></li>
                                                @endif
                                            @endif
                                            
                                        </ul>
                                    </li>

                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-crown"></i><span class="hide-menu">Leaderboards</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="{{URL::to('leaderboard')}}">View Leaderboards</a></li>
                                        </ul>
                                    </li>
                                    

                                @endif
                                {{-------- END SECTION - LECTURER --------}}
                                
                                {{-------- START SECTION - STUDENT --------}}
                                @if (auth()->user()->role == 'student')
                                    <li class="nav-small-cap">E-LEARN</li>
                                    <li> <a class="waves-effect waves-dark" href="{{URL::to('myclass')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">My Class</span></a>
                                    
                                    </li>
                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-crown"></i><span class="hide-menu">Leaderboards</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="{{URL::to('leaderboard')}}">View Leaderboards</a></li>
                                        </ul>
                                    </li>
                                @endif
                                {{-------- END SECTION - STUDENT --------}}

                                
                            
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper">
                    <!-- ============================================================== -->
                    <!-- Container fluid  -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Bread crumb and right sidebar toggle -->
                        <!-- ============================================================== -->

                        <div class="min-h-screen bg-gray-100">

                            @yield('content')
                            <main>
                                @if (isset($slot))
                                    {{ $slot }}
                                @endif
                            </main>
                        </div>
                
                        @stack('modals')


                        <!-- ============================================================== -->
                        <!-- End Page Content -->
                        <!-- ============================================================== -->
                       
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <footer class="footer"> © 2020 Magicx Sdn Bhd </footer>
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->


    @livewireScripts


    <!--JQuery -->
    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ url('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('assets/plugins/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('assets/plugins/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('assets/plugins/custom.min.js') }}"></script>
    <!-- Sweet alert -->
    <script src="{{asset('js/plugins/sweetalert/sweetalert2.min.js')}}"></script>
    
    <!-- Magnific popup JavaScript -->
    <script src="{{url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>


    @stack('scripts')
</body>


</html>


