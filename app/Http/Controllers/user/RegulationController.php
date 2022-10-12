<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function index (Request $request){
        $search =  $request->search;
        if(!$search){
            $regulations = Regulation::latest()->get();
        }
        else{
            $regulations = Regulation::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
            })->get()
            ;
        }
        return view('usr.regulation', compact('regulations'));
    }

    public function detail (Regulation $regulation){
        return view('usr.regulation-detail', compact('regulation'));
    }
}
