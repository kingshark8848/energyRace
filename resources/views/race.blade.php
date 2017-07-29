@extends('layouts.main_frame')

@section('extra_header')
<style>
    body {
        font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        overflow-x: hidden;
        padding-top: 120px;
    }
</style>
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
    <div class="main_content container">
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

                <div class="thumbnail content_body_1">
                    <h2>Let's Race !</h2>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="col-md-6">
                                <img class="img-responsive" src="img/pie_chart.png" alt="">
                            </div>
                            <div class="col-md-6">
                                <img class="img-responsive" src="img/line_chart.jpg" alt="">
                            </div>
                            <p class="congrats">Congratulation ! &nbsp; You beat <span class="rating_percent">73%</span> people.</p>
                        </div>
                        <div class="col-md-1">
                            <p class="small">Share with friends!</p>
                            <img class="img-responsive" src="img/social.jpg">
                        </div>
                    </div>
                </div>

                <div class="caption_full">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            <h4 class="center">&some title&</h4>
                            <img class="img-responsive" src="img/column_chart.png">
                        </div>
                        <div class="col-md-4">
                            <p>al;sehgfq;nbg;lqbjsg<br>awehgtl;aehqhpgh<br>qoehrtqehopgh</p>
                        </div>
                    </div>
                </div>



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
                                </a>
                            </div>
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.colesexpress.com.au" target="_blank">
                                    <img class="img-responsive" src="img/coles_express.jpg">
                                    <p>3x points next shopping at any Coles Express for 5 times!</p>
                                </a>
                            </div>
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.energyaustralia.com.au" target="_blank">
                                    <img class="img-responsive" src="img/energy_aus.gif">
                                    <p>Great deals when you transfer to us!</p>
                                </a>
                            </div>
                            <div class="col-md-3 sponsor_item">
                                <a href="http://www.cleanenergycouncil.org.au" target="_blank">
                                    <img class="img-responsive" src="img/cec.jpeg">
                                    <p>Find out more rewards with Clean Energy Council.</p>
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

            </div>

        </div>

    </div>
    <!-- /.container -->
@endsection