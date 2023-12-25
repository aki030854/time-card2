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
         * 
         */
       $today = Carbon::now()->toDateString();

        // 今日の日付で既に出勤データが存在するか確認
        $existingWork = $user->works()->whereDate('created_at', $today)->first();

        // 既にデータが存在する場合はエラーを返す
        if ($existingWork) {
            return redirect()->back()->with('error', '今日は既に出勤しています。');
        }

        // 出勤ボタンが押された時点の時間を取得
        $work_date = Carbon::now();

        // 出勤ボタンが押された時点の時間を取得
        $punchin = Carbon::now()->toDateTimeString();

        // 新しい出勤データを作成・保存
        $work = new Work();
        $work->user_id = $user->id;
        $work->work_date = $work_date;
        $work->punchin = $punchin;
        $work->save();

        return redirect()->back()->with('success', '出勤しました。');
    }

    public function punchout()
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付を取得
        $today = Carbon::now()->toDateString();

        // 今日の日付で既に退勤データが存在するか確認
        $existingWork = $user->works()->whereDate('created_at', $today)->first();

        // 既にデータが存在しない場合はエラーを返す
        if (!$existingWork) {
            return redirect()->back()->with('error', '今日はまだ出勤していません。');
        }

        // 退勤ボタンが押された時点の時間を取得
        $punchout = Carbon::now()->toDateTimeString();

        // 既に退勤している場合はエラーを返す
        if ($existingWork->punchout_time) {
            return redirect()->back()->with('error', '今日は既に退勤しています。');
        }

        // 退勤データを更新・保存
        $existingWork->punchout = $punchout;
        $existingWork->save();

        return redirect()->back()->with('success', '退勤しました。');
    }
}
 

