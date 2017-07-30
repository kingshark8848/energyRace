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
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <div class="list-group">

                    <a href="/race" class="list-group-item ">Let's Race</a>
                    <a href="/info" class="list-group-item ">More Info</a>
                    <a href="/category" class="list-group-item active">Choose Solar Panel</a>
                </div>
            </div>

            <div class="col-md-10">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Input Form</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <fieldset>
                                <legend></legend>
                                <div class="form-group">
                                    <label for="data1" class="col-lg-2 control-label">Average Daily Sun Hour</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="data1" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="data2" class="col-lg-2 control-label">Average Daily Sun Hour</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="data2" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                                        <p class="btn-primary btn" id="show_table">Show Result</p>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                {{--<div class="thumbnail content_body_1">
                    <h2>Save your money</h2>
                    <div class="row">
                        <div class="col-md-9">
                            <table id="table1">
                                <tr>
                                    <td>Average Daily Sun Hour</td>
                                    <td>Solar system out-of-packet cost</td>
                                    <td>Self consumption ratio</td>
                                    <td>Average Daily energy usage</td>
                                </tr>
                                <tr>
                                    <td>num1</td>
                                    <td>num2</td>
                                    <td>num3</td>
                                    <td>num4</td>
                                </tr>
                            </table>

                            <table id="table2" style="display: none;">
                                <tr>
                                    <td>Energy charge with solar</td>
                                    <td>Energy charge without solar</td>
                                    <td>Years to pay off</td>
                                    <td>Annual saving</td>
                                </tr>
                                <tr>
                                    <td>num5</td>
                                    <td>num6</td>
                                    <td>num7</td>
                                    <td>num8</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <p class="btn-primary btn" id="show_table">Show your output</p>
                        </div>
                    </div>
                </div>--}}
            </div>

        </div>

    </div>
    <!-- /.container -->
@endsection