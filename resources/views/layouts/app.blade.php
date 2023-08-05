@php
    $services = DB::table('services')
        ->select('service_slug', 'service_name')
        ->where('type', 'service')
        ->where('taken', 1)
        ->get();
    $salseforce_services = DB::table('services')
        ->select('service_slug', 'service_name')
        ->where('type', 'salseforce')
        ->where('taken', 1)
        ->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>{{ env('APP_NAME') }} Admin</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->

    <link href="{{ asset('admin/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/sweetalert/sweetalert.css') }}">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.html">
                            <!-- <img src="images/logo.png" alt="" /> --><span>{{ env('APP_NAME') }}</span>
                        </a></div>
                    <li><a href="{{ route('siteInfo') }}"><i class="ti-calendar"></i> Site Info </a></li>

                    {{-- <li><a href="{{ route('home') }}"><i class="ti-calendar"></i> Dashboard </a></li> --}}
                    <li><a href="{{ route('services.index') }}"><i class="ti-calendar"></i> Services </a></li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Service Content <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('add-content') }}">Add Content</a></li>
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ route('serviceContent', $service->service_slug) }}">{{ $service->service_name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <li><a href="{{ route('salseforces.index') }}"><i class="ti-calendar"></i> Salseforce Solution </a>
                    </li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Salseforce Content <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('salseforces.sConCreate') }}">Add Content</a></li>
                            @foreach ($salseforce_services as $s_service)
                                <li><a
                                        href="{{ route('serviceContent', $s_service->service_slug) }}">{{ $s_service->service_name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <li><a href="{{ route('admin.logout') }}"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">

                            <div class="header-icon dropdown">

                                <span class="user-avatar" data-toggle="dropdown"
                                    aria-expanded="false">{{ auth()->user()->name }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="dropdown-menu dropdown-content-body">
                                    <div class="">
                                        <ul>

                                            <li>
                                                <a href="{{ route('admin.logout') }}">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <section id="main-content">


                    @yield('content')



                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin\js\lib\sweetalert\sweetalert.init.js') }}"></script>
    <script src="{{ asset('admin\js\lib\sweetalert\sweetalert.min.js') }}"></script>
    <!-- jquery vendor -->
    <script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('admin/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('admin/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('admin/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <!-- scripit init-->
    <script src="{{ asset('admin/js/dashboard2.js') }}"></script>

    @yield('script')
    <script>
        // document.querySelector(".show_confirm").onclick = function(event) {
        //     event.preventDefault();
        //     swal({
        //             title: `Are you sure you want to delete this data?`,
        //             text: "If you delete this, it will be gone forever.",
        //             // icon: "warning",
        //             buttons: true,
        //             showCancelButton: true,
        //             dangerMode: true,
        //         }),
        //         function(isConfirm) {
        //             console.log(isConfirm);
        //             if (isConfirm) {
        //                 form.submit();
        //             } else {
        //                 swal("Your data file is safe!");
        //             }
        //         }
        // };

        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            alert('Are you sure to delete the service?');
            form.submit();


        });
    </script>
</body>

</html>
