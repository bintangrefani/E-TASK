<?php
namespace App\Http\Controllers\Backend\Fuzzy;


use App\Http\Controllers\Controller;
use App\Fuzzy\Fuzzy;
use App\Models\Hight;
use App\Models\Weight;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{


    public function index(){
        return view('backend.fuzzy.index');
    }

    public function process(Request $request){
        $hight = floatval($request->hight);
        $weight = floatval($request->weight);
        $fuzzy= new Fuzzy($hight,$weight);
        $params=[
            'fuzzy'=>$fuzzy->analyze()
        ];

        return view('backend.fuzzy.result', $params);
    }

}