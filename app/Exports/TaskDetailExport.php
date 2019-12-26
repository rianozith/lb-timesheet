<?php

namespace App\Exports;

use App\Models\TaskDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class TaskDetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TaskDetail::all();
    }
}
