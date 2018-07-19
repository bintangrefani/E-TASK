<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Task;
use App\Models\Resident;
use App\Models\UploadFiles;

class ClassController extends Controller
{
    public function index()
    {
        // $data = Kelas::all();
        $class_id = Resident::select('class_id')->where('user_id', Session::get('activeUser')->id)->get();
        $data = Kelas::whereIn('id', $class_id)->get();
        $resident = Resident::all();
        $params = [
            'resident' => $resident,
            'data' => $data
        ];
        return view('backend-user.class.table', $params);
    }


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
        $title = $request->input('title');
        $id = $request->input('id');
        $file = $request->file('file');
        // $file_name = $file
        // $path = 'public/files';
        // $file->move('public/files', $file);

        $path = 'public/files';

        $file->move($path, $file->getClientOriginalName());

        $upload_file = new UploadFiles;
        $upload_file->task_id = $id;
        $upload_file->user_id = Session::get('activeUser')->id;
        $upload_file->title = $title;
        $upload_file->file = $file->getClientOriginalName();
        $upload_file->save();

        $data = Task::find($id);
        $filedata = UploadFiles::where('user_id', Session::get('activeUser')->id)->first();
        $params = [
            'data' => $data,
            'filedata' => $filedata
        ];
        return view('backend-user.task.show', $params);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kelas::find($id);
        $resident = Resident::where(['class_id'=>$id])->get();
        $task = Task::where(['class_id'=>$id])->get();
        $params = [
            'data' => $data,
            'resident' => $resident,
            'task' => $task
        ];
        return view('backend-user.task.table', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id)
    {
        $data = Task::find($id);
        $filedata = UploadFiles::where('user_id', Session::get('activeUser')->id)
            ->where('task_id', $id)
            ->first();
        $params = [
            'data' => $data,
            'filedata' => $filedata
        ];
        // dd($params);
        return view('backend-user.task.show', $params);
    }

}
