<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Consumen;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('adm.dashboard');
    }

    public function konsumen(Request $request){
        return view('adm.konsumen');
    }

    public function getDataKonsumen(){
        $konsumen = Consumen::latest()->get();
        return response()->json(['data'=>$konsumen]);
    }
}
