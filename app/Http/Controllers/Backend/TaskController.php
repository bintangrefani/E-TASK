<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resident;
use App\Models\Kelas;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $data = Kelas::find($id);
        // return view('task.table', compact('data'));
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
        $id = $request->input('kelas_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $deadline = $request->input('deadline');

        $task = new Task;
        $task->name = $name;
        $task->description = $description;
        $task->class_id = $id;
        $task->deadline = $deadline;
        $task->save();
        return redirect('class');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Task::find($id);
        $params = [
            'data' => $data,
        ];
        return view('task.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Task::find($id);
        return view('task.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Task::find($id);

        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->deadline = $request->get('deadline');
        $data->save();
        return redirect('class')->with('success','Member updated successfully');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Task::find($id);
        $data->delete();
        return redirect('class')->with('success','Member deleted successfully');    
    }


    public function add($id)
    {
        $data = Kelas::find($id);
        $params = [
            'data' => $data,
        ];
        return view('task.form2', $params);
    }


    public function save(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $deadline = $request->input('deadline');

        $task = new Task;
        $task->name = $name;
        $task->description = $description;
        $task->class_id = $id;
        $task->deadline = $deadline;
        $task->save();
        return redirect('class');
    }


    public function list($id)
    {
        $data = Kelas::find($id);
        $resident = Resident::where(['class_id'=>$id])->get();
        $task = Task::where(['class_id'=>$id])->get();
        $params = [
            'data' => $data,
            'resident' => $resident,
            'task' => $task
        ];
        return view('task.table', $params);
    }


}
