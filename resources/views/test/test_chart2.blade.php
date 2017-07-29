@extends('layouts.main_frame')

@section('extra_header')
    <!-- Styles -->
    <style>
        #chartdiv {
            width		: 100%;
            height		: 500px;
            font-size	: 11px;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <div id="chartdiv"></div>
        </div>

    </div>


@endsection

@section('bottom_script')
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <!-- Chart code -->
    <script>
        var chart = AmCharts.makeChart( "chartdiv", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [ {
                "title": "New",
                "value": 4852
            }, {
                "title": "Returning",
                "value": 9899
            } ],
            "titleField": "title",
            "valueField": "value",
            "labelRadius": 5,

            "radius": "42%",
            "innerRadius": "60%",
            "labelText": "[[title]]",

        } );
    </script>
@endsection