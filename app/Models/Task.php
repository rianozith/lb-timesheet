<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name', 'month'
    ];

    public function details()
	{
		return $this->hasMany('App\Models\TaskDetail');
	}

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function totalTime(){

        return 'total time';
    }

    public function totalTask(){

        return 'total task';
    }

}
