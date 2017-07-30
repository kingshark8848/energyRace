<?php
/**
 * Created by PhpStorm.
 * User: kingshark
 * Date: 30/07/17
 * Time: 12:21 PM
 */

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class MyEnv
{
    public static function setUserId()
    {
        $userIdList = [8099,8927, 6463, 6520, 7583, 8099, 8927, 9918, 10746, 12736];
        $randomIndex = array_rand($userIdList);

        DB::table('env')
            ->where('key', 'user_id')
            ->update(['value' => $userIdList[$randomIndex]]);
    }

    public static function getUserId()
    {
        $userId = DB::table('env')
            ->where('key', 'user_id')
            ->first()->value;

        return (int)$userId;

    }
}