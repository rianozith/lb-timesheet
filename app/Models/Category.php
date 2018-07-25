<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'date', 'parent_id', 'soft_index',
    ];

    public function taskDetail()
	{
		return $this->hasMany('App\Models\TaskDetail');
	}
}
