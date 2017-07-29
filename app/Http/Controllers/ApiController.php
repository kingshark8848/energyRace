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
     * @return mixed
     */
    public function getMyDailyElectricityConsumption(Request $request)
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

        $startDayOfLastMonth = Carbon::createFromFormat('Y-m-d', $p_date)->subMonth()->startOfMonth()->toDateString();
//        dd($startDayOfLastMonth);

        $cur_resident_id = config('app.cur_resident_id');

        $data = [];

//        $results = DB::select(DB::raw("SELECT SUM(daily_WH) as last_month_WH FROM v_electricity_daily
//        WHERE type='general' AND respondent_no=? AND MONTH(output_date)=MONTH(?)"),
//            [$cur_resident_id, $p_date])[0];

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
}
