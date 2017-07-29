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
                items: [],
                old_items: [],
                animate_items: [],
                ranking_attr: "",
                score_zoom: 1,
            },
            mounted() {

                let vm = this;
                vm.loadLine();
                vm.loadChart();
            },
            methods: {
                loadChart: function () {

                    let ctx1 = document.getElementById('myChart1').getContext('2d');
                    let myPieChart = new Chart(ctx1, {
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
                            }
                        }
                    };

                    let ctx2 = document.getElementById("myChart2").getContext("2d");
                    let myLine = new Chart(ctx2, config);
                }
            }
        })
    </script>
@endsection