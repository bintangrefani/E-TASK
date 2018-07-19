<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Resident;

class TaskController extends Controller
{
    public function tasks(Request $request){
    	$class_id = $request->class_id;
    	$kelas = Kelas::find($class_id);
    	$task = Task::where('class_id', $class_id)->get();
        $params = [
        	'kelas' => $kelas,
            'task' => $task
        ];
        return response()->json($params);
    }

    public function createTask(Request $request){
        $id = $request->class_id;
        $name = $request->name;
        $description = $request->description;
        $deadline = $request->deadline;

    	$kelas = Kelas::find($id);

        $task = new Task;
        $task->name = $name;
        $task->description = $description;
        $task->class_id = $id;
        $task->deadline = $deadline;
        $task->save();

        $params = [
        	'kelas' => $kelas,
            'task' => $task
        ];
        return response()->json($params);
    }

}
