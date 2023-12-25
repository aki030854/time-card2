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
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付と時間を取得
        $today = Carbon::now();
        
        // ログイン中のユーザーが今日取得したworkのidを取得
        $workId = $user->works()
            ->whereDate('created_at', $today->toDateString())
            ->value('id');

        // 休憩開始ボタンが押された時点の時間を取得
        $startTime = $today->toDateTimeString();

        // Breaking モデルを使用して新しい休憩データを作成
        $breaking = new Breaking();
        $breaking->work_id = $workId;
        $breaking->start_time = $startTime;
        $breaking->save();

        // 成功時の処理などを追加する場合はここに追加

        return redirect()->back()->with('success', '休憩を開始しました。');
    }

        
    

    public function end_time()
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付と時間を取得
        $today = Carbon::now();

        // ログイン中のユーザーが今日取得したworkのidを取得
        $workId = $user->works()
            ->whereDate('created_at', $today->toDateString())
            ->value('id');

        // 休憩終了ボタンが押された時点の時間を取得
        $endTime = $today->toDateTimeString();

        // 最新の休憩データを取得
        $breaking = Breaking::where('work_id', $workId)
            ->latest() // 最新のものを取得
            ->first();

        // 休憩データが存在する場合、end_timeを更新
        if ($breaking) {
            $breaking->end_time = $endTime;
            $breaking->save();
            
            // 成功時の処理などを追加する場合はここに追加

            return redirect()->back()->with('success', '休憩を終了しました。');
        }

        // 休憩データが存在しない場合の処理などを追加する場合はここに追加

        return redirect()->back()->with('error', '休憩データが見つかりませんでした。');
    }
}


