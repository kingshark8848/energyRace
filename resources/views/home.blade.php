@extends('layouts.main_frame')

@section('extra_header')
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
                <a class="navbar-brand" href="#page-top"><img src="img/bulb.png" class="img-rounded" style="display: inline-block;height: 1em">EnergyRace</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#competition-entry">Start Competition</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/logo.jpg" alt="">
                    <div class="intro-text">
                        <h1 class="name">Start EnergyRace</h1>
                        <hr class="star-light">
                        <span class="skills">Saving Electricity Bill & Compete With Your Neighbours</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Competition Entry Section -->
    <section id="competition-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Start Competition</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">

                <form class="form-horizontal" method="get" action="/race">
                    <div class="form-group">
                        <!--                            <label for="nmi" class="col-lg-2 control-label">Input Your NMI</label>-->

                        <div class="col-lg-5 col-lg-offset-3 col-xs-6 col-xs-offset-2">
                            <input type="text" class="form-control" name="nmi" id="nmi" placeholder="Input Your NMI Code" required>
                            <a class="find_nmi" href="http://www.ausgrid.com.au/Common/Customer-Services/Electricity-supply/Blackouts-and-power-restoration/NMIs.aspx#.WXp_lyF96V4" target="_blank">How do I find my NMI?</a>
                        </div>
                        <div class="col-lg-3 col-xs-2 text-left">
                            <button type="submit" class="btn btn-primary">Go!</button>
                        </div>
                    </div>
                </form>

            </div>

            {{--<div class="row">
                <div class="col-lg-2 col-xs-2"></div>
                <div class="col-lg-6 col-xs-6">
                    <a href="http://www.ausgrid.com.au/Common/Customer-Services/Electricity-supply/Blackouts-and-power-restoration/NMIs.aspx#.WXp_lyF96V4" target="_blank">How do I find my NMI?</a>
                </div>
            </div>--}}

        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
                <p>Our project is about electricity consumption ranking system, the main purpose is<br>to encourage customer to save energy.<br><br>What we can see is that the retail price of electricity increase year by year post a burden on financial.</p>


                <div class="row">
                    <div class="col-xs-12">
                        <div id="canvas-holder" style="width:100%; height: 100%; background-color: #ffffff">
                            <canvas id="myLineChart1"></canvas>
                        </div>
                    </div>

                </div>

                <br/><br/>
                <p>The number of pollution problems is increasing!</p>
                <div class="col-md-6 textarea1" width='300' height='300'>
                    <br>
                    <font color = "#FF0000" size="10">3 m<sup>2</sup></sup><br></font>
                    <font color = "#000000" size="4" >of sea ice disappear for every<br></font>
                    <font color = "#FF0000" size="10">1 tones<br></font>
                    <font color = "#000000" size="4">of CO<sup>2</sup> emitted<br></font>
                </div>

                <div class="col-md-6 textarea2" width='300' height='300'>
                    <br>
                    <font color = "#000000" size="4">In QLD, we emit<br></font>
                    <font color = "#000000" size="10">4.2 billion tones<br></font>
                    <font color = "#000000" size="4">of CO<sup>2</sup> each year<br></font>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Us</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>UNSW</p>
                    </div>
                    <div class="footer-col col-md-8">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Dribble</span><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; energyRace 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============modals============== -->
    <!--tip modal-->
    <div class="modal" id="tip-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><img src="img/bulb.png" class="img-rounded" style="display: inline-block;height: 1em">Energy Saving Tips</h4>
                </div>
                <div class="modal-body">
                    <div id="my-tip-content">
                        <p>....</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close Tip</button>
                </div>
            </div>
        </div>
    </div>
    <!--/tip modal-->
@endsection

@section('bottom_script')
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );

            $.ajax({
                method: "GET",
                url: "/api/v1/random_tip",
            }).success(function( res ) {
                console.log(res);
                $('#my-tip-content').html(
                    "<p class='text-danger'><b>"+res.title+"</b></p>" +
                "<blockquote><p style='font-size: medium'>" + res.content + "</p>" +
                    "<a  href='"+ res.url +"' style='font-size: medium'>check more info</a>" +
                    "</blockquote>" +
                "<p class='text-success'>this tip is from origin</p>"
                );

                $('#tip-modal').modal('show');
            }).fail(function () {
                console.log('get tip failed');
            });

            // =================== line chart
            let config = {
                type: 'line',
                data: {
                    labels: [2005, 2006, 2007, 2008, 2009, 2010, 2011,2012,2013,2014 ],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: 'red',
                        borderColor: 'red',
                        data: [
                            0.1227,
                            0.1262,
                            0.1405,
                            0.1481,
                            0.1713,
                            0.1941,
                            0.2069,
                            0.2307,
                            0.2673,
                            0.2538,
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Electricity Tariff Price Increasing Trend of QLD'
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
                                labelString: 'Year'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'KWH'
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

            let ctx2 = document.getElementById("myLineChart1").getContext("2d");
            window.myLine = new Chart(ctx2, config);


        });
    </script>
@endsection