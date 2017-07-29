<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyEConsumptionGivenDay(Request $request)
    {
//        $startDayOfLastMonth = Carbon::createFromFormat('Y-m-d', $p_date)->subMonth()->startOfMonth()->toDateString();

        // validation
        $this->validate($request, [
            'p_date' => 'sometimes|required|date_format:Y-m-d',
        ]);

        // get statistic date
        if ($request->exists('p_date')){
            $p_date = $request->input('p_date');
        }
        else{
            $p_date = config('app.cur_date_str');
        }

        $cur_resident_id = config('app.cur_resident_id');

        // init return data
        $data = [];

        // current day self data
        $curDayMe = DB::select(DB::raw("SELECT * FROM v_electricity_daily 
            WHERE type='general' AND respondent_no=? and output_date=? LIMIT 1"),
            [$cur_resident_id, $p_date])[0];
        //        dd($curDayMe);

        $data['cur_day_self'] = $curDayMe;

        // current day ranking data
        $curDayAll = DB::select(DB::raw("SELECT id, respondent_no, output_date, type, daily_WH, @curRow := @curRow + 1 AS ranking 
            FROM v_electricity_daily
            JOIN    (SELECT @curRow := 0) r
            WHERE type='general' AND output_date=? ORDER BY daily_WH"),
            [$p_date]);
        $curDayAll = collect($curDayAll);
        //        dd($curDayAll);

        // total persons
        $data['person_count'] = count($curDayAll);

        // self ranking
        $data['cur_day_self']->daily_ranking = $curDayAll->where('respondent_no', $cur_resident_id)->first()->ranking;

        // daily top 5
        $data['cur_day_top_5'] = $curDayAll->take(5);


        return response()->json($data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyDailyEConsumptionGivenMonth(Request $request)
    {
        // validation
        $this->validate($request, [
            'p_date' => 'sometimes|required|date_format:Y-m-d',
        ]);

        if ($request->exists('p_date')){
            $p_date = $request->input('p_date');
        }
        else{
            $p_date = config('app.cur_date_str');
        }
        $cur_resident_id = config('app.cur_resident_id');

        // init return data
        $data = [];

        $myMonthDailyData = DB::select(DB::raw("SELECT * FROM v_electricity_daily
            WHERE type='general' AND respondent_no=? AND MONTH(output_date)=MONTH(?) AND YEAR(output_date)=YEAR(?)"),
            [$cur_resident_id, $p_date, $p_date]);

        $myMonthDailyData = collect($myMonthDailyData);
        $data['my_month_daily_data']=$myMonthDailyData;

        return response()->json($data);


    }

    public function getMyMonthEConsumptionGivenYear(Request $request)
    {
        // validation
        $this->validate($request, [
            'p_date' => 'sometimes|required|date_format:Y-m-d',
        ]);

        if ($request->exists('p_date')){
            $p_date = $request->input('p_date');
        }
        else{
            $p_date = config('app.cur_date_str');
        }
        $cur_resident_id = config('app.cur_resident_id');

        // init return data
        $data = [];

        $myYearMonthData = DB::select(DB::raw("SELECT MONTH(output_date) as v_month,SUM(daily_WH) as month_WH FROM v_electricity_daily
            WHERE type='general' AND respondent_no=? AND YEAR(output_date)=YEAR(?) AND output_date<=? GROUP BY MONTH(output_date)"),
            [$cur_resident_id, $p_date, $p_date]);
        $myYearMonthData = collect($myYearMonthData);
        $data['my_year_month_data']=$myYearMonthData;

        $p_last_year_date = Carbon::createFromFormat('Y-m-d', $p_date)->subYear()->toDateString();
        $myLastYearMonthData = DB::select(DB::raw("SELECT MONTH(output_date) as v_month,SUM(daily_WH) as month_WH FROM v_electricity_daily
            WHERE type='general' AND respondent_no=? AND YEAR(output_date)=YEAR(?) AND output_date<=? GROUP BY MONTH(output_date)"),
            [$cur_resident_id, $p_last_year_date, $p_last_year_date]);
        $myLastYearMonthData = collect($myLastYearMonthData);
        $data['my_last_year_month_data']=$myLastYearMonthData;

        return response()->json($data);


    }


}
