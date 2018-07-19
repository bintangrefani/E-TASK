<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use App\Models\Task;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Resident;

class UserController extends Controller
{
    public function users(User $user){
        $user = User::where(['role'=>2])->get();
        // return response()->json($user);
        return fractal()
            ->collection($user)
            ->transformWith(new UserTransformer)
            ->toArray();
    }

    public function register(Request $request, User $user){
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',

        ]);

        $user = $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => sha1($request->password),
            'role'      => 2,
        ]);

        $params = [
            'code' => '201',
            'description' => 'New User Created',
            'message' => 'Register Success!',
            'data' => $user
        ];

        return response()->json($params, 201);
    }

    public function login(Request $request, User $user){
        $email = $request->input('email');
        $password = sha1($request->password);

        $activeUser=User::where(['email'=>$email])
            ->where('role', 2)
            ->get()->first();

        if(is_null($activeUser)){
            $params = [
                'code' => '404',
                'description' => 'Email Not Found',
                'message' => 'Email is not Found!',
                'data' => $email
            ];
            return response()->json($params, 404);
        }

        if($activeUser->password != $password){
            $params = [
                'code' => '401',
                'description' => 'Unauthorized',
                'message' => 'Password is Wrong!',
                'data' => $password
            ];
            return response()->json($params, 401);
        }

        $activeUser->save();

        $params = [
            'code' => '200',
            'description' => 'Authorized',
            'message' => 'Login Success!',
            'data' => $activeUser
        ];

        return response()->json($params, 200);
    }

    public function myclasses(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);

        $resident = Resident::where(['user_id'=> $user_id])->get();

        if(is_null($resident)){
            return response()->json('this user has no class');
        }
        else{
            $class_id = Resident::select(['class_id'])->where('user_id', $user_id)->get();
            $kelas = Kelas::whereIn('id', $class_id)->get();
            $user_id = Resident::select(['user_id'])->whereIn('class_id', $class_id)->get();
            // $user2 = User::whereIn('id', $user_id)
            //     ->where('role', 1)
            //     ->get();
            $params = [
                'user' => $user->name,
                'kelas' => $kelas,
                // 'user' => $user2
            ];
            return response()->json($params);

        }
    }

    public function classes(Request $request){
        $user_id = $request->user_id;
        $class_id = $request->class_id;

        $user = User::find($user_id);
        $kelas = Kelas::find($class_id);
        $task = Task::where('class_id', $class_id)->get();
        $users_id = Resident::select(['user_id'])->where('class_id', $class_id)->get();
        $user2 = User::whereIn('id', $users_id)
            ->where('role', 1)
            ->get();
        $params = [
            'user' => $user->name,
            'kelas' => $kelas,
            'mentor' => $user2,
            'task' => $task
        ];

        return response()->json($params);
    }


    public function classes2(Request $request){
        $class_id = $request->class_id;
        $user_id = $request->user_id;

        $test = Resident::where('class_id', $class_id)->where('user_id', $user_id)->first();

        $kelas = Kelas::find($class_id);
        $user = User::where('id', $user_id)->first();

        $params = [
            'kelas' => $kelas,
            'user' => $user,
            'test' => $test
        ];
        return response()->json($params);
    }


    public function enrollClass(Request $request){
        $class_id = $request->class_id;
        $user_id = $request->user_id;

        $kelas = Kelas::find($class_id);
        $user = User::where('id', $user_id)->first();

        $class_id = Kelas::select('id')->where('id',$class_id)->get();
        $user_id = User::select('id')->where('id', $user_id)->get();

        $resident = new Resident;
        $resident->class_id = $class_id[0]->id;
        $resident->user_id = $user_id[0]->id;
        $resident->save();

        $params = [
            'kelas' => $kelas,
            'user' => $user
        ];
        return response()->json($params);
    }

}
