@extends('layouts.main_frame')

@section('extra_header')
    <style>
        body {
            font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            overflow-x: hidden;
            padding-top: 120px;
        }
    </style>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.14.1/lodash.min.js"></script>
    <script src="https://unpkg.com/tween.js@16.3.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection

@section('content')
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href='/home'><img src="img/bulb.png" class="img-rounded"
                                                          style="display: inline-block;height: 1em">EnergyRace</a>
            </div>

            {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
            {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li class="hidden">--}}
            {{--<a href="#page-top"></a>--}}
            {{--</li>--}}
            {{--<li class="page-scroll">--}}
            {{--<a href="#competition-entry">Start Competition</a>--}}
            {{--</li>--}}
            {{--<li class="page-scroll">--}}
            {{--<a href="#about">About</a>--}}
            {{--</li>--}}
            {{--<li class="page-scroll">--}}
            {{--<a href="#contact">Contact</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- /.navbar-collapse -->--}}

        </div>
        <!-- /.container-fluid -->
    </nav>


    <!-- Page Content -->
    <div class="container" id="my-vue">
        <div class="row"></div>

        <div class="row">

            <div class="col-md-2">
                <div class="list-group">
                    <a href="/race" class="list-group-item ">Let's Race</a>
                    <a href="/info" class="list-group-item active">More Info</a>
                    <a href="/category" class="list-group-item ">Choose Solar Panel</a>
                </div>
            </div>

            <div class="col-md-10">
                <div class="well content_body_2">
                    <h3>Compare with yourself</h3>
                    <p>Each month consumption, this year VS. last year</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="canvas-holder" style="width:100%">
                                <canvas id="myCompareWithMyself-1"></canvas>
                            </div>
                        </div>
                    </div>

                    <hr class="my-hr">

                    <p>Total consumption, this year VS. last year</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="canvas-holder" style="width:100%">
                                <canvas id="myCompareWithMyself-2"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <p id="compare_yourself" class="large">Have you improved comparing to your last year?</p>
                            <h2 id="compare_yourself_show" class="center" style="display: none">10% better!</h2>
                        </div>
                    </div>

                </div>

                <div class="thumbnail content_body_1">
                    <h3>Data in your area</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <img class="img-responsive" src="img/line_chart.jpg" alt="">
                        </div>
                        <div class="col-md-4">
                            <p id="position_suburb" class="large">What position are you in your suburb?</p>
                            <h2 id="position_suburb_show" class="center" style="display: none">TOP 20%</h2>
                        </div>
                    </div>

                </div>

                <div class="recommend">
                    <p class="large center">Recommendation</p>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 show_tips">
                            <a href="/category">
                                <img class="img-responsive" src="img/recommend1.png">
                                <p>See how much you could improve by setting up a solar board.</p>
                            </a>
                        </div>
                        <div class="col-md-3 show_tips">
                            <a rel="lightbox" href="#tips1">
                                <img class="img-responsive" src="img/recommend2.png">
                                <p>Tips for saving energy.</p>
                            </a>
                        </div>
                        <div class="col-md-3 show_tips">
                            <a rel="lightbox" href="#tips2">
                                <img class="img-responsive" src="img/recommend3.png">
                                <p>Tips for upgrading your machine.</p>
                            </a>
                        </div>

                        <div id="tips1" style="display: none;">
                            <h2>energy tips</h2>
                            <ul>
                                <li>Wash your clothes in cold water</li>
                                <li>Remove dust from the back of your fridge</li>
                                <li>Use energy saving light bulbs</li>
                            </ul>
                        </div>
                        <div id="tips2" style="display: none;">
                            <h2>upgrade your machines</h2>
                            <ul>
                                <li>Choose electric devices with a good star rating</li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- /.container -->
@endsection

@section('bottom_script')

    <script>
        new Vue({
            el: '#my-vue',
            data: {
                month_data: {},
            },
            mounted() {
                let vm = this;

                Chart.defaults.global.animation.duration = 2000;

                // month data
                $.ajax({
                    method: "GET",
                    url: "/api/v1/me/month_e_consumption_given_year",
                }).success(function( res ) {
                    console.log(res);
                    vm.month_data = res;

                    vm.loadBarChart();
                    vm.loadLine();
                });


            },
            methods: {
                loadBarChart: function () {
                    let vm = this;

                    let monthDataThisYear  = _.orderBy(vm.month_data.my_year_month_data, ['v_month'], ['asc']);
                    let monthDataLastYear  = _.orderBy(vm.month_data.my_last_year_month_data, ['v_month'], ['asc']);

                    let monthLabels = _.map(monthDataThisYear, 'v_month');
                    let monthWHThisYear = _.map(monthDataThisYear, 'month_WH');

                    let monthWHLastYear = _.map(monthDataLastYear, 'month_WH');

                    let color = Chart.helpers.color;
                    let barChartData = {
                        labels: monthLabels,
                        datasets: [{
                            label: 'Month Consumption Last Year',
                            backgroundColor: color('blue').alpha(0.5).rgbString(),
                            borderColor: 'blue',
                            borderWidth: 1,
                            data: monthWHLastYear
                        },
                        {
                            label: 'Month Consumption This Year',
                            backgroundColor: color('red').alpha(0.5).rgbString(),
                            borderColor: 'red',
                            borderWidth: 1,
                            data: monthWHThisYear
                        }]

                    };

                    let ctx = document.getElementById("myCompareWithMyself-1").getContext("2d");
                    window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Same months electricity consumption, this year vs last year'
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Month'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'WH'
                                    }
                                }]
                            },

                            animation: {
                                onComplete: function () {
                                    console.log('hello');
                                    let chartInstance = this.chart,
                                        ctx = chartInstance.ctx;

                                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                    ctx.fillStyle = 'black';
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';

                                    this.data.datasets.forEach(function(dataset, i) {
                                        let meta = chartInstance.controller.getDatasetMeta(i);
                                        meta.data.forEach(function (bar, index) {
                                            let data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y);
                                        });
                                    });
                                }
                            }
                        }
                    });
                },

                loadLine: function () {
                    let vm = this;

                    let monthDataThisYear  = _.orderBy(vm.month_data.my_year_month_data, ['v_month'], ['asc']);
                    let monthDataLastYear  = _.orderBy(vm.month_data.my_last_year_month_data, ['v_month'], ['asc']);

                    let monthLabels = _.map(monthDataThisYear, 'v_month');

                    let monthWHThisYear = _.map(monthDataThisYear, 'month_WH');
                    let monthSumWHThisYear = vm.prefixSum(monthWHThisYear);

                    let monthWHLastYear = _.map(monthDataLastYear, 'month_WH');
                    let monthSumWHLastYear = vm.prefixSum(monthWHLastYear);


                    console.log(monthSumWHLastYear);

                    let config = {
                        type: 'line',
                        data: {
                            labels: monthLabels,
                            datasets: [{
                                label: "Cumulative Consumption This Year",
                                backgroundColor: 'red',
                                borderColor: 'red',
                                data: monthSumWHThisYear,
                                fill: false,
                            }, {
                                label: "Cumulative Consumption Last Year",
                                fill: false,
                                backgroundColor: 'blue',
                                borderColor: 'blue',
                                data: monthSumWHLastYear,
                            }]
                        },
                        options: {
                            responsive: true,
                            title:{
                                display:true,
                                text:'Cumulative consumption Trend Chart, this year VS. last year'
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Month'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'WH'
                                    }
                                }]
                            },
                            animation: {
                                onComplete: function () {
                                    console.log('hello');
                                    let chartInstance = this.chart,
                                        ctx = chartInstance.ctx;

                                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                    ctx.fillStyle = 'black';
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';

                                    this.data.datasets.forEach(function(dataset, i) {
                                        let meta = chartInstance.controller.getDatasetMeta(i);
                                        meta.data.forEach(function (bar, index) {
                                            let data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y);
                                        });
                                    });
                                }
                            }
                        }
                    };

                    let ctx2 = document.getElementById("myCompareWithMyself-2").getContext("2d");
                    window.myLine = new Chart(ctx2, config);
                },

                prefixSum: function (arr) {
                    let builder = function (acc, n) {
                        let lastNum = acc.length > 0 ? acc[acc.length-1] : 0;
                        acc.push(parseFloat(lastNum) + parseFloat(n));
                        return acc;
                    };
                    return _.reduce(arr, builder, []);
                }
            }
        })
    </script>
@endsection