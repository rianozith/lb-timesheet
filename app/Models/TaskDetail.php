<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    protected $fillable = [
    	'task_id', 'category_id', 'time','total_task', 'total_time', 'note'
    ];

    public static function boot() {
        parent::boot();

        static::saved(function($model) {
            if ($model->total_time < 1) {
                $model->refreshTotalTime();
            }
            // $model->order->refreshTotalPayment();
        });
    }
    public function refreshTotalTime()
    {
        $total_time = $this->time * $this->total_task;
        $this->total_time = $total_time;
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

}
