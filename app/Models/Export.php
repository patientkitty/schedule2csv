<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    //
    public function getDateAttribute($date){
        $dt = Carbon::parse($date);
        return $dt->format('m/d/Y');
    }
}
