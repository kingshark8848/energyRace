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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>
@endsection

@section('content')
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href='/home' ><img src="img/bulb.png" class="img-rounded" style="display: inline-block;height: 1em">EnergyRace</a>
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
    <div class="main_content container" id="my-vue">
        <div class="row"></div>

        <div class="row">

            <div class="col-md-2">
                <div class="list-group">
                    <a href="/race" class="list-group-item active">Let's Race</a>
                    <a href="/info" class="list-group-item ">More Info</a>
                    <a href="/category" class="list-group-item ">Category 3</a>
                </div>
            </div>

            <div class="col-md-10">
                {{--<div class="personal_info">--}}
                    {{--<table class="personal_info_table">--}}
                        {{--<tr>--}}
                            {{--<td><img class="img-responsive" src="img/house.png"></td>--}}
                            {{--<td><img class="img-responsive" src="img/address.png"></td>--}}
                            {{--<td><img class="img-responsive" src="img/people.png"></td>--}}
                            {{--<td><img class="img-responsive" src="img/panel.png"></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><p>type: house</p></td>--}}
                            {{--<td><p>1 George st, Kiama</p></td>--}}
                            {{--<td><p>4 persons</p></td>--}}
                            {{--<td><p>no solar</p></td>--}}
                        {{--</tr>--}}

                    {{--<img class="img-responsive" src="img/house.png">--}}
                    {{--<p>type: house</p>--}}
                    {{--<img class="img-responsive" src="img/address.png">--}}
                    {{--<p>1 George st, Kiama</p>--}}
                    {{--<img class="img-responsive" src="img/people.png">--}}
                    {{--<p>4 persons</p>--}}
                    {{--<img class="img-responsive" src="img/panel.png">--}}
                    {{--<p>no solar</p>--}}
                    {{--</table>--}}
                {{--</div>--}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your Basic Info</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <figure style="display: inline-block" width="50" height="50">
                                <img class="img-responsive" src="img/house.png">
                                <figcaption>
                                    <span class="label label-danger my-user-icon-label">House</span>
                                </figcaption>
                            </figure>

                            <figure style="display: inline-block" width="50" height="50">
                                <img class="img-responsive" src="img/address.png">
                                <figcaption>
                                    <span class="label label-danger my-user-icon-label">1 George st, Kiama</span>
                                </figcaption>
                            </figure>

                            <figure style="display: inline-block" width="50" height="50">
                                <img class="img-responsive" src="img/people.png">
                                <figcaption>
                                    <span class="label label-danger my-user-icon-label">4 persons</span>
                                </figcaption>
                            </figure>

                            <figure style="display: inline-block" width="50" height="50">
                                <img class="img-responsive" src="img/panel.png">
                                <figcaption>
                                    <span class="label label-danger my-user-icon-label">No solar system</span>
                                </figcaption>
                            </figure>
                        </div>

                        <br/>

                        <div class="row">
                            <figure style="display: inline-block" width="50" height="50">
                                <img class="img-responsive" src="img/Coin_0.png" style="width: 50px">
                                <figcaption>
                                    <span class="label label-success my-user-icon-label">you gained 340.5 energy saving point</span>
                                </figcaption>
                            </figure>

                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#my-modal-rewards">Trade for some benefits</button>
                        </div>

                    </div>
                </div>

                <div class="thumbnail content_body_1">
                    <h3>New Achievement</h3>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="col-md-6">
                                <div id="canvas-holder" style="width:100%">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="canvas-holder">
                                    <canvas id="myTop5" style="display: block; width:100%; height: 200px;"></canvas>
                                </div>
                            </div>


                            <p class="congrats" v-if="beat_percent >= 75 ">Congratulation ! &nbsp Yesterday you beat <span class="rating_percent">@{{ beat_percent }} %</span> people nearby.<br/>
                                (based on your yesterdays' electricity consumption, <b>the less, the better!</b>) <br/>
                                + 4.5 <img class="img-responsive my-coin-with-text" src="img/Coin_0.png">
                            </p>

                            <p class="congrats" v-else>
                                Try harder! Yesterday you only beat <span class="rating_percent">@{{ beat_percent }} %</span> people nearby.<br/>
                                (based on your yesterdays' electricity consumption, <b>the less, the better!</b>) <br/>
                                <span class="text-danger" style="font-size: large">if you can beat more than 75% people nearby, you can get some credit points!!</span>

                            </p>

                        </div>
                        <div class="col-md-1">
                            <p class="small">Share with friends!</p>
                            <img class="img-responsive" src="img/social.jpg">
                        </div>
                    </div>
                </div>

                {{--<div class="caption_full">--}}
                    {{--<h3>Your Month Consumption This Year</h3>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div id="canvas-holder" style="width:100%">--}}
                                {{--<canvas id="myMonthLineChart"></canvas>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-8 col-md-offset-2">--}}
                            {{--<p id="race_note">al;sehgfq;nbg;lqbjsg<br>awehgtl;aehqhpgh<br>qoehrtqehopgh</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

        </div>

    </div>
    <!-- /.container -->

    {{-- modals --}}
    {{--modal rewards--}}
    <div class="modal fade" id="my-modal-rewards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="well content_body_2">
                    <h3>Reward</h3>
                    {{--<div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>--}}
                    <p class="center">Click below to see what sponsors provide.</p>
                    <div class="sponsor">
                        <div class="row sponsor_row">
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.ausgrid.com.au" target="_blank">
                                    <img class="img-responsive" src="img/ausgrid.jpg">
                                    <p>10% off next bill!</p>
                                    <p>cost 100 <img class="img-responsive my-coin-with-text" src="img/Coin_0.png"></p>
                                </a>
                            </div>
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.colesexpress.com.au" target="_blank">
                                    <img class="img-responsive" src="img/coles_express.jpg">
                                    <p>3x points next shopping at any Coles Express for 5 times!</p>
                                    <p>cost 200 <img class="img-responsive my-coin-with-text" src="img/Coin_0.png"></p>
                                </a>
                            </div>
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.energyaustralia.com.au" target="_blank">
                                    <img class="img-responsive" src="img/energy_aus.gif">
                                    <p>Great deals when you transfer to us!</p>
                                    <p>cost 150 <img class="img-responsive my-coin-with-text" src="img/Coin_0.png"></p>
                                </a>
                            </div>
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.cleanenergycouncil.org.au" target="_blank">
                                    <img class="img-responsive" src="img/cec.jpeg">
                                    <p>Find out more rewards with Clean Energy Council.</p>
                                    <p>cost 200 <img class="img-responsive my-coin-with-text" src="img/Coin_0.png"></p>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{--<div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>--}}

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    {{--/modal rewards--}}
@endsection

@section('bottom_script')

    <script>
        new Vue({
            el: '#my-vue',
            data: {
                daily_data: {},
                top_persons: [{'key':1,'val': 476, 'rank':1}, {'key':2,'val': 400, 'rank':2}, {'key':3,'val': 532, 'rank':3}],
                ranking_attr: "val",
                score_zoom: 1,
            },
            computed: {
                beat_percent: function () {

                    let vm = this;

                    try{
                        let dailyRanking = vm.daily_data.cur_day_self.daily_ranking;
                        let dailyPersonCount = vm.daily_data.person_count;
                        return ((dailyPersonCount - dailyRanking) / (dailyPersonCount-1) * 100 ).toFixed(2);
                    }
                    catch (e){
                        return 0;
                    }

                }
            },
            mounted() {
                let vm = this;

                // daily data
                $.ajax({
                    method: "GET",
                    url: "/api/v1/me/electricity_e_consumption_given_day",
                }).success(function( res ) {
//                        console.log(res);
                    vm.daily_data = res;

                    vm.loadPieChart();
                    vm.loadBarChartRanking();
                });

                Chart.defaults.global.animation.duration = 2000;
            },
            methods: {
                loadPieChart: function () {

                    let vm = this;

                    let dailyRanking = vm.daily_data.cur_day_self.daily_ranking;
                    let dailyPersonCount = vm.daily_data.person_count;

                    let ctx1 = document.getElementById('myBarChart').getContext('2d');
                    window.myPieChart = new Chart(ctx1, {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [
                                    (dailyRanking-1), dailyPersonCount-dailyRanking
                                ],
                                backgroundColor: [
                                    "#bcccf7",
                                    "#2455f7",
                                ],
                                label: 'Expenditures'
                            }],
                            labels: [
                                "People beat you",
                                "People you beat",
                            ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                display: true,
                                text: 'Yesterday you compare with people nearby'
                            },
                            animation: {
                                segmentShowStroke : true,
                                animateScale: true,
                                animateRotate: true
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        let dataset = data.datasets[tooltipItem.datasetIndex];
                                        let total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                            return previousValue + currentValue;
                                        });
                                        let currentValue = dataset.data[tooltipItem.index];
                                        let precentage = ((currentValue/total) * 100).toFixed(2);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }
                    });

                },

                loadBarChartRanking: function () {
                    let vm = this;

                    // compute top5 and me
                    let top5 = _.orderBy(vm.daily_data.cur_day_top_5, ['ranking'], ['asc']);

                    // get labels
                    let labels = ['Top1','Top2','Top3','Top4','Top5'];
                    let backgroundColor = ['blue','blue','blue','blue','blue'];
                    let borderColor = ['blue','blue','blue','blue','blue'];
                    let v_data = _.map(top5, 'daily_WH');

                    let selfIndex = _.findIndex(top5, ['respondent_no', vm.daily_data.cur_day_self.respondent_no]);
                    if (selfIndex!==-1){
                        labels[selfIndex] += ' (Me)';
                        backgroundColor[selfIndex] = 'red';
                        borderColor[selfIndex] = 'red';
                    }
                    else{
                        labels.push('Me');
                        backgroundColor.push('red');
                        borderColor.push('red');
                        v_data.push(vm.daily_data.cur_day_self.daily_WH);
                    }

                    let color = Chart.helpers.color;
                    let data = {
                        labels: labels,
                        datasets: [{
                            label: 'Dataset 1',
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1,
                            data: v_data
                        }]
                    };

                    let ctx = document.getElementById("myTop5").getContext("2d");

                    window.myBarRanking = new Chart(ctx, {
                        type: 'horizontalBar',
                        data: data,
                        options: {
                            scales:{xAxes:[{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'WH'
                                },
                                ticks:{beginAtZero:true}
                            }]},
                            responsive: true,
                            legend: {
                                position: 'top',
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Yesterday Top5 Energy Saver'
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
                                            ctx.fillText(data, bar._model.x+20, bar._model.y+5);
                                        });
                                    });
                                }
                            }

                        }
                    });

                }
            }
        })
    </script>
@endsection