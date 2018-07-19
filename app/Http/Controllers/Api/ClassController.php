<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Resident;

class ClassController extends Controller
{
    public function all(Kelas $kelas){
        $kelas = Kelas::all();
        return response()->json($kelas);
    }

    public function classes($class_id){
        $kelas = Kelas::find($class_id);
        $user_id = Resident::select(['user_id'])
            ->where('class_id', $class_id)
            ->get();
        $mentor = User::whereIn('id', $user_id)
            ->where('role', 1)
            ->get();
        $user = User::whereIn('id', $user_id)
            ->where('role', 2)
            ->get();

        $params = [
            'kelas' => $kelas,
            'mentor' => $mentor,
            'user' => $user
        ];
        return response()->json($params);
    }

    public function register(Request $request, User $user){
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $kelas = Kelas::all();
        return response()->json($kelas);
    }
}
