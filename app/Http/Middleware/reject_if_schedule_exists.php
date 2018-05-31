<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Schedule;
class reject_if_schedule_exists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->all();
        $existSchedule = Schedule::where([
            ['event_name','=',$data['event_name']],
            ['date_start','=',$data['date_start']],
            ['date_end','=',$data['date_end']],
            ['time_start','=',$data['time_start']],
            ['time_end','=',$data['time_end']],
            ['room','=',$data['room']],
            ['weekdays','=',$data['weekdays']],
        ])->get();
        $count = count($existSchedule);
       // return redirect('/input');
        if($count != 0){
            //var_dump($count);die();
            //return redirect('/input');
            // dd($count);
             return redirect()->route('input')->withErrors('this schedule already exist');
            //echo 'schedule already exist';
        }
        return $next($request);
    }
}
