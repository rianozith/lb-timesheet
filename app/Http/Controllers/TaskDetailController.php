<?php

namespace App\Http\Controllers;

use App\Models\TaskDetail;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'task_id' => 'integer',
            'date' => 'date',
            'category_id' => 'integer',
           
            'mytask' => 'integer',
        ]);

        $detail = TaskDetail::create([
            'task_id' => $request->task_id,
            'date' => Carbon::createFromFormat('d-m-Y', $request->date),
            'category_id' => $request->category,
            'time' => $request->time,
            'mytask' => $request->mytask,
            'sub_total' => $request->mytask * $request->time,
        ]);

        if ($detail) {
            flash('Timesheet berhasil ditambahkan')->success();
        }else{
            flash('Timesheet gagal ditambahkan')->error();
        }
        return redirect()->route('task.show', $detail->task_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskDetail $taskDetail)
    {
        $categories = Category::pluck('name', 'id');
        return view('task-detail.edit', compact('categories', 'taskDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskDetail $taskDetail)
    {
        $this->validate($request,[
            'task_id' => 'integer',
            'date' => 'date',
            'category_id' => 'integer',
           
            'mytask' => 'integer',
        ]);
        
        $detail = TaskDetail::find($taskDetail->id);
        $detail->date           = $request->date;
        $detail->category_id    = $request->category;
        $detail->time           = $request->time;
        $detail->mytask         = $request->mytask;
        $detail->sub_total      = $request->mytask * $request->time;
        $detail->save();

        flash('Daily task berahasil diedit');
        return redirect()->route('task.show', $taskDetail->task_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskDetail $taskDetail)
    {   
        \Log::info('riano');
        \Log::info($taskDetail);
        $detail = TaskDetail::find($taskDetail->id);
        $detail->delete();
        $detail->task->refreshTotalTask();

        flash('Daily task berhasil dihapus')->success();
        return redirect()->back();
        // return response()->json(true);
    }
}
