<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Resident;
use App\Models\UploadFiles;

class UploadFileController extends Controller
{
    public function submit(Request $request){    
        $title = $request->input('title');
        $task_id = $request->input('task_id');
        $user_id = $request->input('user_id');
        $file = $request->file('file');

    	$task = Task::find($task_id);
        $path = 'public/files';

        $file->move($path, $file->getClientOriginalName());

        $upload_file = new UploadFiles;
        $upload_file->task_id = $task_id;
        $upload_file->user_id = $user_id;
        $upload_file->title = $title;
        $upload_file->file = $file->getClientOriginalName();
        $upload_file->save();

        $params = [
        	'task' => $task,
            'upload_file' => $upload_file
        ];
        return response()->json($params);

}
}
