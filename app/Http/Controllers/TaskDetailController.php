<?php

namespace App\Http\Controllers;

use App\Models\TaskDetail;
use Illuminate\Http\Request;

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
        $detail = TaskDetail::create([
            'task_id' => $request->task_id,
            'category_id' => $request->category,
            'time' => $request->time,
            'total_task' => $request->total_task,
            'total_time' => $request->total_task * $request->time,
        ]);

        if ($detail) {
            flash('timesheet berhasil ditambahkan')->success();
        }else{
            flash('timesheet gagal ditambahkan')->error();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskDetail $taskDetail)
    {
        TaskDetail::find($taskDetail->id)->delete();

        flash('task detail berhasil dihapus')->success();
        return redirect()->back();
    }
}
