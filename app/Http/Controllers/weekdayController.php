<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Excel;
//use Maatwebsite\Excel\Facades\Excel;

use App\Models\Weekday;

class weekdayController extends Controller
{
    //
    public function readExcel(){
        //DB::table('weekdays')->truncate();
        $path = storage_path( 'app/' . "weekdays.xlsx");

        Excel::load($path, function($reader) {
            //  $reader->
            $results = $reader->formatDates(false)->toArray();

            foreach ($results as $result) {
                $weekdays = new Weekday();
                //$emsmaillog = new Emsmaillog();
                foreach ($result as $key => $value) {
                    $weekdays->$key = $result[$key];

                }
                //var_dump($result);
                //die();
                $weekdays->save();
                //echo "complete";
                //$emsmaillog->save();
                //DB::table('emsmaillogs')->where('reservation_id', '=', 10870)->delete();

            }
        });
    }
}
