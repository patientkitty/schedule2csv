<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Export;
use App\Models\Weekday;

class scheduleController extends Controller
{
    //
    public function newschedule(){
//        $weekday = Weekday::where('id','<',11)->get();
//        dd($weekday);
        //从网页表单获取课程信息
        $group = 1;
        $eventname = 'test class';
        $datestart = '2018-06-01';
        $dateend = '2018-09-11';
        $timestart = 1100;
        $timeend = 1305;
        $weekdays = 3;
        $room = 210;
        $data = [
            'group'=>1,
            'event_name'=>'test class',
            'date_start'=>'2018-06-01',
            'date_end'=>'2018-07-11',
            'time_start'=>1100,
            'time_end'=>1305,
            'weekdays'=>3,
            'room'=>210
                ];

//        //插入schedules表，记录课程每周几上课
//        $schedule = new Schedule();
//        foreach ($data as $key => $value) {
//            $schedule->$key = $data[$key];
//        }
//        $schedule->save();
        //dd($data);
        //查询weekdays表，获取到具体上课日期
        $exportdate = Weekday::where([
            ['date','>=',$data['date_start']],
            ['date','<=',$data['date_end']],
            ['weekday','=',$data['weekdays']],
        ])->get();
        //echo $exportdate;
        //创建导出格式的数组
        $exportdata =[];
        foreach ($exportdate as $value){
            //echo $value;
            array_push($exportdata,[
                'group'=>$data['group'],
                'event_name'=>$data['event_name'],
                'date'=>$value['date'],
                'time_start'=>$data['time_start'],
                'time_end'=>$data['time_end'],
                'room'=>$data['room']
            ]);
        }
        //插入exports表，用于EMS导出格式
//        $export = new Export();
//        $export->truncate();
        foreach ($exportdata as $dates) {
            //print_r($dates);
            $export = new Export();
            foreach ($dates as $key => $value) {
                //printf($dates['date']);
                $export->$key = $dates[$key];
            }
            $export->save();
        }

    }
}
