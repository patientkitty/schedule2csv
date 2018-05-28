<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Export;
use App\Models\Weekday;
use Maatwebsite\Excel\Facades\Excel;

class scheduleController extends Controller
{
    //
    public function newschedule($data){

        //从网页表单inputs获取课程信息$data，检查在schedule表中是否存在重复数据
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
        if($count <> 0){
            echo 'schedule already exist';
        }else{
            //dd($data);
            //插入schedules表，记录课程每周几上课
            $schedule = new Schedule();
            foreach ($data as $key => $value) {
                if($key != '_token'){
                    $schedule->$key = $data[$key];
                }
            }
            $schedule->save();
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
    public function searchGroup(Request $request){
        $searchGroup = $request->input('group');
        $results = Export::where('group','=',$searchGroup)->get();
        $count = count($results);
        $inputs = $results;
        $total = $count;
        return view('export', compact('inputs', 'total', 'searchGroup'));
        //return view('export',['inputs'=>$results],['total'=>$count],['searchGroup'=>$searchGroup]);
    }
    public function searchEventName($data){
        //通过event_name和group，返回export表中已经有的数据
        $existExport = Export::where([
            ['event_name','=',$data['event_name']],
            ['group','=',$data['group']],
        ])->get();
        return $existExport;
    }
    public function exportData($searchGroup){
       // $searchGroup = $request->get('searchGroup');
        $results = Export::where('group','=',$searchGroup)->get();
        //dd($results);
        //echo count($results);
        $filename = uniqid() ;
        Excel::create($filename, function($excel) use ($results) {
            $excel->sheet('Sheet 1', function($sheet) use($results) {
                $sheet->fromArray($results->toArray());
            });
        })->download('xlsx');
    }

    public function test(){
        $results = Weekday::where('id','<',10)->get();
        dd($results);
    }

    public function inputview(){
        return view('input');
    }
    public function add(Request $request){
        //$inputs = $request->input('Group');
        //return view('input',['inputs'=>$inputs]);
        $inputs= $request->all();
        $this->newschedule($inputs);
        $existExport = $this->searchEventName($inputs);
        return view('input',['inputs'=>$existExport]);
        echo 'Add Complete';
        //dd($inputs);
    }
    public function export(){
        return view('export');
    }
}
