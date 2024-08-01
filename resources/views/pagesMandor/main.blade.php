<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Tooplate">

    <title>{{ $title }}</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assetmandor') }}/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('assetmandor') }}/css/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('assetmandor') }}/css/apexcharts.css" rel="stylesheet">

    <link href="{{ asset('assetmandor') }}/css/tooplate-mini-finance.css" rel="stylesheet">
    <!--

Tooplate 2135 Mini Finance

https://www.tooplate.com/view/2135-mini-finance

Bootstrap 5 Dashboard Admin Template

-->

</head>

<body>
    <header class="navbar sticky-top flex-md-nowrap bg-warning">
        <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
            <a class="navbar-brand" href="index.html">
                <i class="bi-box"></i>
                SIP Mandor
            </a>
        </div>

        {{-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        {{-- <form class="custom-form header-form ms-lg-3 ms-md-3 me-lg-auto me-md-auto order-2 order-lg-0 order-md-0"
            action="#" method="get" role="form">
            <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search">
        </form> --}}

        <div class="navbar-nav me-lg-2">
            <div class="nav-item text-nowrap d-flex align-items-center">


                {{-- <div class="dropdown ps-3">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" id="navbarLightDropdownMenuLink">
                        <i class="bi-bell"></i>
                        <span
                            class="position-absolute start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-lg-end notifications-block-wrap bg-white shadow"
                        aria-labelledby="navbarLightDropdownMenuLink">
                        <small>Notifications</small>

                        <li class="notifications-block border-bottom pb-2 mb-2">
                            <a class="dropdown-item d-flex  align-items-center" href="#">
                                <div class="notifications-icon-wrap bg-success">
                                    <i class="notifications-icon bi-check-circle-fill"></i>
                                </div>

                                <div>
                                    <span>Your account has been created successfuly.</span>

                                    <p>12 days ago</p>
                                </div>
                            </a>
                        </li>

                        <li class="notifications-block border-bottom pb-2 mb-2">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="notifications-icon-wrap bg-info">
                                    <i class="notifications-icon bi-folder"></i>
                                </div>

                                <div>
                                    <span>Please check. We have sent a Daily report.</span>

                                    <p>10 days ago</p>
                                </div>
                            </a>
                        </li>

                        <li class="notifications-block">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="notifications-icon-wrap bg-danger">
                                    <i class="notifications-icon bi-question-circle"></i>
                                </div>

                                <div>
                                    <span>Account verification failed.</span>

                                    <p>1 hour ago</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div> --}}

                {{-- <div class="dropdown ps-1">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-three-dots-vertical"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-social bg-white shadow">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <a class="dropdown-item text-center" href="#">
                                        <img src="images/social/search.png" class="profile-image img-fluid"
                                            alt="">
                                        <span class="d-block">Google</span>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-4 col-4">
                                    <a class="dropdown-item text-center" href="#">
                                        <img src="images/social/spotify.png" class="profile-image img-fluid"
                                            alt="">
                                        <span class="d-block">Spotify</span>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-4 col-4">
                                    <a class="dropdown-item text-center" href="#">
                                        <img src="images/social/telegram.png" class="profile-image img-fluid"
                                            alt="">
                                        <span class="d-block">Telegram</span>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-4 col-4">
                                    <a class="dropdown-item text-center" href="#">
                                        <img src="images/social/snapchat.png" class="profile-image img-fluid"
                                            alt="">
                                        <span class="d-block">Snapchat</span>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-4 col-4">
                                    <a class="dropdown-item text-center" href="#">
                                        <img src="images/social/tiktok.png" class="profile-image img-fluid"
                                            alt="">
                                        <span class="d-block">Tiktok</span>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-4 col-4">
                                    <a class="dropdown-item text-center" href="#">
                                        <img src="images/social/youtube.png" class="profile-image img-fluid"
                                            alt="">
                                        <span class="d-block">Youtube</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="px-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#logout" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            @include('pagesMandor.partials.navbar')
            @include('sweetalert::alert')
            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3">
                    <h1 class="h2 mb-0">{{ $title }}</h1>

                    {{-- <small class="text-muted">Hello {{ Auth::user()->name }}, welcome back!</small> --}}
                </div>

                @yield('halaman')

                @include('pagesMandor.partials.navbar2')
                @include('pagesMandor.partials.footer')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('assetmandor') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assetmandor') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetmandor') }}/js/apexcharts.min.js"></script>
    <script src="{{ asset('assetmandor') }}/js/custom.js"></script>

    <script type="text/javascript">
        var options = {
            series: [13, 43, 22],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Balance', 'Expense', 'Credit Loan', ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
        chart.render();
    </script>

    <script type="text/javascript">
        var options = {
            series: [{
                name: 'Income',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Expense',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Transfer',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</body>

</html>
