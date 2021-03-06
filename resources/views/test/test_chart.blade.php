@extends('layouts.main_frame')

@section('extra_header')
    <script src="https://unpkg.com/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.14.1/lodash.min.js"></script>
    <script src="https://unpkg.com/tween.js@16.3.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>
@endsection

@section('content')
    <div id="my-vue">
        <div class="row">
            <div class="col-xs-3">
                <div id="canvas-holder" style="width:100%">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-6">
                <div id="canvas-holder" style="width:100%">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-6">
                <div id="canvas-holder" style="width:100%">
                    <canvas id="myChart3"></canvas>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-4">
                <div id="canvas-holder" style="width:100%; height: 100%">
                    <canvas id="myChart4"></canvas>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-6">

                <div class="col-xs-10">

                    <div v-for="item in top_persons" v-bind:key="top_persons.key" class="row">

                        <svg width="50" height="20">
                            <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle">
                                top @{{item.rank}}
                            </text>
                        </svg>

                        <svg :width="item[ranking_attr]*score_zoom" height="20">
                            <rect :width="item[ranking_attr]*score_zoom" height="20" :style="{fill: 'blue'}"/>
                        </svg>

                        <svg width=50 height="20">
                            <rect width=50 height="20" style="fill:rgb(255,255,255);fill-opacity:0;"/>
                            <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle">
                                @{{item[ranking_attr]}}
                            </text>
                        </svg>


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottom_script')

    <script>
        new Vue({
            el: '#my-vue',
            data: {
                country_data: {},
                his_items: [],

                my_date: "",
                top_persons: [{'key':1,'val': 476, 'rank':1}, {'key':2,'val': 400, 'rank':2}, {'key':3,'val': 532, 'rank':3}],
                old_items: [],
                animate_items: [],
                ranking_attr: "val",
                score_zoom: 1,
            },
            mounted() {
                Chart.defaults.global.animation.duration = 2000;

                let vm = this;
                vm.loadLine();
                vm.loadPieChart();
                vm.loadBarChart();
                vm.loadBarChartRanking();
            },
            methods: {
                loadPieChart: function () {

                    let ctx1 = document.getElementById('myChart1').getContext('2d');
                    window.myPieChart = new Chart(ctx1, {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [
                                    (7-1), 25-7
                                ],
                                backgroundColor: [
                                    "#bcccf7",
                                    "#2455f7",
                                ],
                                label: 'Expenditures'
                            }],
                            labels: [
                                "People beat you today",
                                "People you beat today",
                            ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                display: true,
                                text: 'Compare with people nearby'
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
                                        let precentage = Math.floor(((currentValue/total) * 100)+0.5);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }
                    });

                },

                loadLine: function () {
                    let MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    let config = {
                        type: 'line',
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July"],
                            datasets: [{
                                label: "My First dataset",
                                backgroundColor: 'red',
                                borderColor: 'red',
                                data: [
                                    400,
                                    600,
                                    456,
                                    700,
                                    330,
                                    400,
                                    533,
                                ],
                                fill: false,
                            }, {
                                label: "My Second dataset",
                                fill: false,
                                backgroundColor: 'blue',
                                borderColor: 'blue',
                                data: [
                                    345,
                                    546,
                                    456,
                                    589,
                                    789,
                                    1021,
                                    200,
                                ],
                            }]
                        },
                        options: {
                            responsive: true,
                            title:{
                                display:true,
                                text:'Chart.js Line Chart'
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
                                        labelString: 'Value'
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

                    let ctx2 = document.getElementById("myChart2").getContext("2d");
                    window.myLine = new Chart(ctx2, config);
                },

                loadBarChart: function () {
                    let MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    let color = Chart.helpers.color;
                    let barChartData = {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        datasets: [{
                            label: 'Dataset 1',
                            backgroundColor: color('red').alpha(0.5).rgbString(),
                            borderColor: 'red',
                            borderWidth: 1,
                            data: [
                                400,
                                378,
                                678,
                                564,
                                982,
                                302,
                                700,
                                378,
                                678,
                                564,
                                982,
                                302,
                            ]
                        }, {
                            label: 'Dataset 2',
                            backgroundColor: color('blue').alpha(0.5).rgbString(),
                            borderColor: 'blue',
                            borderWidth: 1,
                            data: [
                                60,
                                178,
                                378,
                                264,
                                782,
                                402,
                                600,
                                178,
                                378,
                                264,
                                782,
                                402,
                            ]
                        }]

                    };

                    let ctx = document.getElementById("myChart3").getContext("2d");
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
                                text: 'Chart.js Bar Chart'
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
                                        labelString: 'Value'
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

                loadBarChartRanking: function () {
                    let color = Chart.helpers.color;
                    let data = {
                        labels: ['Top1','Top2','Top3','Top4','Top5', 'Me'],
                        datasets: [{
                            label: 'Dataset 1',
                            backgroundColor: ['blue','blue','blue','blue','blue','red'],
                            borderColor: ['blue','blue','blue','blue','blue','red'],
                            borderWidth: 1,
                            data: [
                                400,
                                478,
                                678,
                                864,
                                982,
                                1100
                            ]
                        }]
                    };

                    let ctx = document.getElementById("myChart4").getContext("2d");

                    window.myBarRanking = new Chart(ctx, {
                        type: 'horizontalBar',
                        data: data,
                        options: {
                            scales:{xAxes:[{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Value'
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
                                text: 'Chart.js Bar Chart'
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