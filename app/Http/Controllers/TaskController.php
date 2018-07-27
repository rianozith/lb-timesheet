<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('period', 'asc')->get();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Carbon::parse($request->period)); //debuging

        $this->validate($request,[
            'period' => 'string',
        ]);

        $period = Carbon::parse($request->period)->format('Y-m-d');

        if ($check = Task::where('period', 'LIKE', '%'.$period.'%')->first()) {
            flash('Task sudah tersedia')->warning();
            Alert::warning('Task sudah tersedia')->autoclose(3000);
            return redirect()->route('task.index');
        }else{
            $task = Task::create([
                'period' => $period,
            ]);    
        }
        

        if($task){
            flash('Task berhasil ditambahkan')->success();

        }else{
            flash('Task gagal ditambahkan')->error();
        }

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $details = TaskDetail::where('task_id', $task->id)->orderBy('date', 'asc')->get();
        $task_id = $task->id;
        $categories = Category::pluck('name', 'id');
        return view('task.show', compact('task' ,'task_id', 'details', 'categories' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact($task));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request,[
            'period' => 'string',
        ]);

        Task::update([$request->all()]);

        flash('task berahasil diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::find($task->id)->delete();
        flash('task berhasil dihapus');
        return redirect()->back();
    }
}
