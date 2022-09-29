<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CountModel;
use App\Models\DailyModel;
use Carbon\Carbon;

class Countervisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $ip = $request->ip();
        $datenow = Carbon::today()->format('Y-m-d');
        $datesub = Carbon::today()->subDay()->format('Y-m-d');
        $num = CountModel::where('ip', $ip)->count();
        $checkdate = CountModel::first();
        if ($checkdate) {
            if ($checkdate->date !== $datenow) {
                $today_count = CountModel::count('date');
                CountModel::truncate();
                DailyModel::insert([
                    'date' => $datesub,
                    'num' => $today_count
                ]);
                CountModel::insert([
                    'ip' => $ip,
                    'date' => $datenow
                ]);
            }
        }

        if ($num > 0) {
            return $next($request);
        } else {
            CountModel::insert([
                'ip' => $ip,
                'date' => $datenow
            ]);
            return $next($request);
        }
        return $next($request);
    }
}
