<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
  public function index($date = null)
    {
        // 引数で指定された日付がない場合は今日の日付を使用
        $targetDate = $date ? Carbon::parse($date) : Carbon::now();

        // ユーザーごとの日別の勤務状況を取得するクエリ
        $userWorkStatus = User::leftJoin('works', 'users.id', '=', 'works.user_id')
            ->leftJoin('breakings', 'works.id', '=', 'breakings.work_id')
            ->select(
                'users.name',
                'works.punchin',
                'works.punchout',
                DB::raw('SUM(breakings.duration) as total_break_time'),
                DB::raw('TIMEDIFF(works.punchout, works.punchin) as total_work_time')
            )
            ->whereDate('works.punchin', $targetDate)
            ->groupBy('users.id', 'users.name', 'works.punchin', 'works.punchout')
            ->paginate(5);

        return view('list.index', compact('userWorkStatus', 'targetDate'));
    }
}
