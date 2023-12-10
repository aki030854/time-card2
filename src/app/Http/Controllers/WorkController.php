<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Models\Work;

class WorkController extends Controller
{
    public function start_time()
    {
        $user = Auth::user();

        /**
         * 打刻は1日一回までにしたい 
         * DB
         */
        $oldWork = Work::where('user_id', $user->id)->latest()->first();
        $oldWorkDay = NULL;
        if ($oldWork) {
            $oldWorkstart_time = new Carbon($oldWork->start_time);
            $oldWorkDay = $oldWork->start_time->startOfDay();
        }

        $newWorkDay = Carbon::today();
        
        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        if ($oldWorkDay == $newWorkDay){
            if(empty($oldWork->end_time)) {
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }else{
             return redirect()->back()->with('error', 'すでに退勤済みです');
        }
           
        }

        //$timestamp = Timestamp::create([
          //  'user_id' => $user->id,
           // 'punchIn' => Carbon::now(),
      //  ]);

      $work = new Work();
      $work->user_id=$user->id;
      $work->work_date=Carbon::now();
      $work->start_time=Carbon::now();
      $work->save();

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function end_time()
    {
        $user = Auth::user();
        $work = Work::where('user_id', $user->id)->latest()->first();

        if( !empty($oldwork->end_time)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $work->update([
            'end_time' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}
 

