<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Work;
use App\Models\Breaking;

class BreakingController extends Controller
{
    public function start_time()
    {
        //$user = Auth::user();
        $work = Work::all();
        $breaking = Breaking::where('work_id', $work->id)->latest()->first();

        $newBreakingDay = Carbon::today();

        

         //if(empty($oldWork->start_time)) {
           // return redirect()->back()->with('error', '出勤打刻がされていません');
        // }

          //if(empty($oldWork->end_time)) {
           // return redirect()->back()->with('error', 'すでに退勤打刻がされています');
        //  }

        

      $breaking = new Breaking();
      $breaking->work_id=$work->id;
      $breaking->start_time=Carbon::now();
      $breaking->save();

        return redirect()->back()->with('my_status', '休憩開始打刻が完了しました');
    }

    public function end_time()
    {
        //$user = Auth::user();
        $work = Work::all();
        $breaking = Breaking::where('work_id', $work->id)->latest()->first();

       // if( !empty($oldbreaking->end_time)) {
           // return redirect()->back()->with('error', '既に休憩終了打刻をされています');
        //}
        $breaking->update([
            'end_time' => Carbon::now()
        
        ]);
        

    

        return redirect()->back()->with('my_status', '休憩終了打刻が完了しました');
    }
}


