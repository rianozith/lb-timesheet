<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
    	'period', 'total_time', 'total_task', 'grand_total', 'earning'
    ];

    public function details()
	{
		return $this->hasMany('App\Models\TaskDetail');
	}

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function refreshTotalTask(){
        $total_time = 0;
        $total_task = 0;
        $sub_total = 0;
        foreach($this->details as $detail) {
            $total_time += $detail->time;
            $total_task += $detail->mytask;
            $sub_total += $detail->sub_total;
        }
        $this->total_time = $total_time;
        $this->total_task = $total_task;
        $this->grand_total = $sub_total;
        // jika edit setelah desember 2020 maka earning * 5
        $year = 2020; 
        $month = 12; 
        $day = 1;
        if ($this->created_at > Carbon::createFromDate($year, $month, $day) ) {
            $this->earning = ($this->grand_total/60) * 5;
        } else {
            $this->earning = ($this->grand_total/60) * 8.82;
        }
        
        $this->save();

    }

    public function getPeriodIdnAttribute(){
        return Carbon::parse($this->period)->format('F Y');
    }
    public function getPeriodMonthAttribute(){
        return Carbon::parse($this->period)->format('M y');
    }
    public function hasMonth(){
        return ;
    }

    

}
