<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Work;
use App\Models\Breaking;

class CassersController extends Controller
{
    public function start_time()
    {
        $user = Auth::user();

        $newBreakingDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
       // if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
           // return redirect()->back()->with('error', 'すでに出勤打刻がされています');
           
        //}

         if(empty($oldWork->start_time)) {
            return redirect()->back()->with('error', '出勤打刻がされていません');
         }

          if(empty($oldWork->end_time)) {
            return redirect()->back()->with('error', 'すでに退勤打刻がされています');
          }

        //$casser = Casser::create([
        //    'user_id' => $user->id,
        //    'breakStart' => Carbon::now(),
       // ]);

      $breaking = new Breaking();
      $breaking->user_id=$user->id;
      $breaking->start_time=Carbon::now();
      $breaking->save();

        return redirect()->back()->with('my_status', '休憩開始打刻が完了しました');
    }

    public function end_time()
    {
        $user = Auth::user();
        $breaking = Breaking::where('work_id', $work->id);

        if( !empty($oldbreaking->end_time)) {
            return redirect()->back()->with('error', '既に休憩終了打刻をされています');
        }
        $breaking->update([
            'end_time' => Carbon::now()
        
        ]);
        

    

        return redirect()->back()->with('my_status', '休憩終了打刻が完了しました');
    }
}


