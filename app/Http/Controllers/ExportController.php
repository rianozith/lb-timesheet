<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Exports\TaskExport;
use App\Exports\TaskDetailExport;
use App\Models\Category;
use App\Models\Task;
use App\Models\TaskDetail;

class ExportController extends Controller
{
    public function category_export_excel()
    {
        return Excel::download(new CategoryExport, 'category-timesheet.xlsx');
    }

    public function task_export_excel()
    {
        return Excel::download(new TaskExport, 'task-timesheet.xlsx');
    }

    public function task_detail_export_excel()
    {
        return Excel::download(new TaskDetailExport, 'task-detail-timesheet.xlsx');
    }
}
