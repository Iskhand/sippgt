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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('LTE/plugins') }}/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('LTE/dist') }}/css/adminlte.min.css" />
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <?php
        date_default_timezone_set('Asia/Jakarta');
        ?>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}{{ $blok }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    {{-- KONTEN --}}
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Pekerja</span>
                                    <span class="info-box-number">
                                        {{ $JumlahPekerja }} Orang
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pekerja Blok 1</span>
                                    <span class="info-box-number">{{ $Blok1 }} Orang</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pekerja Blok 2</span>
                                    <span class="info-box-number">{{ $Blok2 }} Orang</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pekerja Blok 3</span>
                                    <span class="info-box-number">{{ $Blok3 }} Orang</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BAR CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Progres Tahun {{ date('Y') }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="
                          min-height: 250px;
                          height: 250px;
                          max-height: 250px;
                          max-width: 100%;
                        "></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        {{-- <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Area Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart"
                                        style="
                          min-height: 250px;
                          height: 250px;
                          max-height: 250px;
                          max-width: 100%;
                        "></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Data Linting {{ date('D-m-y') }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart"
                                    style="
                        min-height: 250px;
                        height: 250px;
                        max-height: 250px;
                        max-width: 100%;
                      "></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART -->
                        {{-- <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Pie Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart"
                                    style="
                        min-height: 250px;
                        height: 250px;
                        max-height: 250px;
                        max-width: 100%;
                      "></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->
                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">
                        <!-- LINE CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Data Pekerja</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="pieChart"
                                        style="
                          min-height: 250px;
                          height: 250px;
                          max-height: 250px;
                          max-width: 100%;
                        "></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- BAR CHART -->
                        {{-- <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="
                          min-height: 250px;
                          height: 250px;
                          max-height: 250px;
                          max-width: 100%;
                        "></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->

                        <!-- STACKED BAR CHART -->
                        {{-- <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Stacked Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart"
                                        style="
                          min-height: 250px;
                          height: 250px;
                          max-height: 250px;
                          max-width: 100%;
                        "></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->
                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Add Content Here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('LTE/plugins') }}/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('LTE/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('LTE/plugins') }}/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('LTE/dist') }}/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('LTE/dist') }}/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            // var areaChartCanvas = $("#areaChart").get(0).getContext("2d");

            // var areaChartData = {
            //     labels: [
            //         "January",
            //         "February",
            //         "March",
            //         "April",
            //         "May",
            //         "June",
            //         "July",
            //     ],
            //     datasets: [{
            //             label: "Digital Goods",
            //             backgroundColor: "rgba(60,141,188,0.9)",
            //             borderColor: "rgba(60,141,188,0.8)",
            //             pointRadius: false,
            //             pointColor: "#3b8bba",
            //             pointStrokeColor: "rgba(60,141,188,1)",
            //             pointHighlightFill: "#fff",
            //             pointHighlightStroke: "rgba(60,141,188,1)",
            //             data: [28, 48, 40, 19, 86, 27, 90],
            //         },
            //         {
            //             label: "Electronics",
            //             backgroundColor: "rgba(210, 214, 222, 1)",
            //             borderColor: "rgba(210, 214, 222, 1)",
            //             pointRadius: false,
            //             pointColor: "rgba(210, 214, 222, 1)",
            //             pointStrokeColor: "#c1c7d1",
            //             pointHighlightFill: "#fff",
            //             pointHighlightStroke: "rgba(220,220,220,1)",
            //             data: [65, 59, 80, 81, 56, 55, 40],
            //         },
            //     ],
            // };

            // var areaChartOptions = {
            //     maintainAspectRatio: false,
            //     responsive: true,
            //     legend: {
            //         display: false,
            //     },
            //     scales: {
            //         xAxes: [{
            //             gridLines: {
            //                 display: false,
            //             },
            //         }, ],
            //         yAxes: [{
            //             gridLines: {
            //                 display: false,
            //             },
            //         }, ],
            //     },
            // };

            // // This will get the first returned node in the jQuery collection.
            // new Chart(areaChartCanvas, {
            //     type: "line",
            //     data: areaChartData,
            //     options: areaChartOptions,
            // });

            // //-------------
            // //- LINE CHART -
            // //--------------
            // var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            // var lineChartOptions = $.extend(true, {}, areaChartOptions);
            // var lineChartData = $.extend(true, {}, areaChartData);
            // lineChartData.datasets[0].fill = false;
            // lineChartData.datasets[1].fill = false;
            // lineChartOptions.datasetFill = false;

            // var lineChart = new Chart(lineChartCanvas, {
            //     type: "line",
            //     data: lineChartData,
            //     options: lineChartOptions,
            // });

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
            var donutData = {
                labels: ["Rosso Merah", "Rosso Hitam", "Rosso Cokelat", "Jawas"],
                datasets: [{
                    data: [
                        {{ $chartLinting->sum('lt_merah') }},
                        {{ $chartLinting->sum('lt_hitam') }},
                        {{ $chartLinting->sum('lt_cokelat') }},
                        {{ $chartLinting->sum('lt_jawas') }},
                    ],
                    backgroundColor: [
                        "#f56954",
                        "#000000",
                        "#f39c12",
                        "#00a65a",
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
            var pieData = {
                labels: ["Blok 1", "Blok 2", "Blok 3"],
                datasets: [{
                    data: [
                        {{ $Blok1 }},
                        {{ $Blok2 }},
                        {{ $Blok3 }},
                    ],
                    backgroundColor: [
                        // "#f56954",
                        "#00a65a",
                        "#f39c12",
                        "#00c0ef",
                        "#3c8dbc",
                        "#d2d6de",
                    ],
                }, ],
            };
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
            var barChartData = {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "Agustus",
                    "September",
                    "Oktober",
                    "November",
                    "Desember",
                ],
                datasets: [{
                        label: "Blok 2",
                        backgroundColor: "rgba(96, 211, 148,0.9)",
                        borderColor: "rgba(96, 211, 148,0.8)",
                        pointRadius: false,
                        pointColor: "#3b8bba",
                        pointStrokeColor: "rgba(96, 211, 148,1)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(96, 211, 148,1)",
                        data: [
                            {{ $B2jan }},
                            {{ $B2feb }},
                            {{ $B2mar }},
                            {{ $B2apr }},
                            {{ $B2mei }},
                            {{ $B2jun }},
                            {{ $B2jul }},
                            {{ $B2ags }},
                            {{ $B2sep }},
                            {{ $B2okt }},
                            {{ $B2nov }},
                            {{ $B2des }},
                        ],
                    },
                    {
                        label: "Blok 1",
                        backgroundColor: "rgba(238, 96, 85, 1)",
                        borderColor: "rgba(238, 96, 85, 1)",
                        pointRadius: false,
                        pointColor: "rgba(238, 96, 85, 1)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(238, 96, 85,1)",
                        data: [
                            {{ $B1jan }},
                            {{ $B1feb }},
                            {{ $B1mar }},
                            {{ $B1apr }},
                            {{ $B1mei }},
                            {{ $B1jun }},
                            {{ $B1jul }},
                            {{ $B1ags }},
                            {{ $B1sep }},
                            {{ $B1okt }},
                            {{ $B1nov }},
                            {{ $B1des }},
                        ],
                    },
                    {
                        label: "Blok 3",
                        backgroundColor: "rgba(255, 186, 8, 1)",
                        borderColor: "rgba(255, 186, 8, 1)",
                        pointRadius: false,
                        pointColor: "rgba(255, 186, 8, 1)",
                        pointStrokeColor: "#03071E",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            {{ $B3jan }},
                            {{ $B3feb }},
                            {{ $B3mar }},
                            {{ $B3apr }},
                            {{ $B3mei }},
                            {{ $B3jun }},
                            {{ $B3jul }},
                            {{ $B3ags }},
                            {{ $B3sep }},
                            {{ $B3okt }},
                            {{ $B3nov }},
                            {{ $B3des }},
                        ],
                    },
                ],
            };
            var temp0 = barChartData.datasets[0];
            var temp1 = barChartData.datasets[1];
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
