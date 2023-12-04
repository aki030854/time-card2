<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Models\Casser;

class CassersController extends Controller
{
    public function breakStart()
    {
        $user = Auth::user();

        $newCasserDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
       // if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
           // return redirect()->back()->with('error', 'すでに出勤打刻がされています');
           
        //}

         if(empty($oldTimestamp->punchIn)) {
            return redirect()->back()->with('error', '出勤打刻がされていません');
         }

          if(empty($oldTimestamp->punchOut)) {
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
          }

        //$casser = Casser::create([
        //    'user_id' => $user->id,
        //    'breakStart' => Carbon::now(),
       // ]);

      $casser = new Casser();
      $casser->user_id=$user->id;
      $casser->breakstart=Carbon::now();
      $casser->save();

        return redirect()->back()->with('my_status', '休憩開始打刻が完了しました');
    }

    public function breakEnd()
    {
        $user = Auth::user();
        $casser = Casser::where('user_id', $user->id)->latest()->first();

        if( !empty($casser->breakEnd)) {
            return redirect()->back()->with('error', '既に休憩終了打刻をされています');
        }
        $casser->update([
            'breakEnd' => Carbon::now()
        
        ]);
        $casser->save();

    

        return redirect()->back()->with('my_status', '休憩終了打刻が完了しました');
    }
}



