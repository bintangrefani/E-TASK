<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function actionIndex(Request $request)
    {
        return view('dashboard.index');
    }

    public function actionIndexUser(Request $request)
    {
        return view('dashboard.index-user');
    }

    public function actionIndexMentor(Request $request)
    {
        return view('dashboard.index-mentor');
    }
}
