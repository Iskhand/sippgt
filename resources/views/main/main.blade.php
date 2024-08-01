<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('assets') }}/img/logopx.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins') }}/fontawesome-free/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins') }}/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist') }}/css/adminlte.min.css" />

</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Preloader -->

        @include('partials.loader')
        @include('sweetalert::alert')

        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials.sidebar')
        <!-- /Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}{{ $blok }}</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('mainContent')

                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('partials.footer')
        <!-- /Main Footer -->
    </div>
    <!-- ./wrapper -->
    <!-- ALLERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $(document).on('Click', '#hapus', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            })
        })
    </script>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('lte/plugins') }}/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('lte/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Adminlte App -->
    <script src="{{ asset('lte/dist') }}/js/adminlte.js"></script>

    <!-- PAGE plugins-->
    <!-- jQuery Mapael -->
    <script src="{{ asset('lte/plugins') }}/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('lte/plugins') }}/raphael/raphael.min.js"></script>
    <script src="{{ asset('lte/plugins') }}/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('lte/plugins') }}/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins') }}/chart.js/Chart.min.js"></script>

    {{-- <!-- Adminlte for demo purposes -->
    <script src="{{ asset('lte/dist') }}/js/demo.js"></script>
    <!-- Adminlte dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte/dist') }}/js/pages/dashboard2.js"></script> --}}
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $("#areaChart").get(0).getContext("2d");

            var areaChartData = {
                labels: [
                    "Jaaaan",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                ],
                datasets: [{
                        label: "Digital Goods",
                        backgroundColor: "rgba(60,141,188,0.9)",
                        borderColor: "rgba(60,141,188,0.8)",
                        pointRadius: false,
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(60,141,188,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: [28, 48, 40, 19, 86, 27, 90],
                    },
                    {
                        label: "Electronics",
                        backgroundColor: "rgba(210, 214, 222, 1)",
                        borderColor: "rgba(210, 214, 222, 1)",
                        pointRadius: false,
                        pointColor: "rgba(210, 214, 222, 1)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40],
                    },
                ],
            };

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                    }, ],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        },
                    }, ],
                },
            };

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: "line",
                data: areaChartData,
                options: areaChartOptions,
            });

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            var lineChartOptions = $.extend(true, {}, areaChartOptions);
            var lineChartData = $.extend(true, {}, areaChartData);
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false;

            var lineChart = new Chart(lineChartCanvas, {
                type: "line",
                data: lineChartData,
                options: lineChartOptions,
            });

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
            var donutData = {
                labels: ["Chrome", "IE", "FireFox", "Safari", "Opera", "Navigator"],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: [
                        "#f56954",
                        "#00a65a",
                        "#f39c12",
                        "#00c0ef",
                        "#3c8dbc",
                        "#d2d6de",
                    ],
                }, ],
            };
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: "doughnut",
                data: donutData,
                options: donutOptions,
            });

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: "pie",
                data: pieData,
                options: pieOptions,
            });

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChartData = $.extend(true, {}, areaChartData);
            var temp0 = areaChartData.datasets[0];
            var temp1 = areaChartData.datasets[1];
            barChartData.datasets[0] = temp1;
            barChartData.datasets[1] = temp0;

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
            };

            new Chart(barChartCanvas, {
                type: "bar",
                data: barChartData,
                options: barChartOptions,
            });

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $("#stackedBarChart")
                .get(0)
                .getContext("2d");
            var stackedBarChartData = $.extend(true, {}, barChartData);

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }, ],
                    yAxes: [{
                        stacked: true,
                    }, ],
                },
            };

            new Chart(stackedBarChartCanvas, {
                type: "bar",
                data: stackedBarChartData,
                options: stackedBarChartOptions,
            });
        });
    </script>
</body>

</html>
