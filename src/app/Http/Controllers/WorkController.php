<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Model\User;
use App\Models\Work;

class WorkController extends Controller
{
    public function punchin()
    {
        $user = Auth::user();
        
        /**
         * 打刻は1日一回までにしたい 
         * DB
         */
        $oldWork = Work::where('user_id', $user->id)->latest()->first();
        
        $oldWorkDay = NULL;
        if ($oldWork) {
            $oldWorkpunchin = new Carbon($oldWork->punchin);
            $oldWorkDay = $oldWorkpunchin->startOfDay();
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

        

      $work = new Work();
      $work->user_id=$user->id;
      $work->work_date=Carbon::now();
      $work->punchin=Carbon::now();
      $work->save();

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function punchout()
    {
        $user = Auth::user();
        $work = Work::where('user_id', $user->id)->latest()->first();

        if( !empty($oldwork->punchout)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $work->update([
            'punchout' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}
 

