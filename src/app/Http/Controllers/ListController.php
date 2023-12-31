<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
  public function index($date = null)
    {
        $targetDate = $date ? Carbon::parse($date) : Carbon::now();

        // ユーザーごとの日別の勤務状況を取得するクエリ
        $userWorkStatus = User::leftJoin('works', 'users.id', '=', 'works.user_id')
            ->leftJoin('breakings', 'works.id', '=', 'breakings.work_id')
            ->select(
                'users.name',
                DB::raw('SUM(TIMESTAMPDIFF(MINUTE, breakings.start_time, breakings.end_time)) as total_break_time'),
                DB::raw('MAX(works.punchin) as punchin_time'),
                DB::raw('MAX(works.punchout) as punchout_time')
            )
            ->whereDate('works.punchin', $targetDate)
    ->groupBy('users.id', 'users.name') // works.punchin を GROUP BY から削除
    ->get();
    }
}
