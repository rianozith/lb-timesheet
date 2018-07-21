<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TaskDetail extends Model
{
    protected $fillable = [
    	'date', 'task_id', 'category_id', 'date', 'time','mytask', 'sub_total', 'note'
    ];

    public static function boot() {
        parent::boot();

        static::saved(function($model) {
            if ($model->sub_total < 1) {
                $model->refreshTotalTime();
            }
            $model->task->refreshTotalTask();
        });
    }
    public function refreshTotalTime()
    {
        $sub_total = $this->time * $this->mytask;
        $this->sub_total = $sub_total;
        $this->save();
    }

    public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	public function task()
	{
		return $this->belongsTo('App\Models\Task');
	}

    // public function getHumanCategoryAttribute(){

    //     switch($this->category_id){
    //         case 1 :
    //             return 'Experimental';
    //         case 2 :
    //             return 'Side by Side';
    //         default:
    //             return 'Undefinied';
    //     }
    // }

    public function getDateIdnAttribute(){
        return Carbon::parse($this->date)->format('d-m-Y');
    }

}
