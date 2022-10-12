<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function index(){
        $regulations = Regulation::latest()->get();
        return view('adm.regulation', compact('regulations'));
    }

    public function regulation_add () {
        return view('adm.regulation-add');
    }

    public function create(Request $request){
        $request->validate([
            'title'   => 'required',
            'file'   => 'mimes:pdf',
        ]);
  
        $input = $request->all();
  
        if ($file = $request->file('file')) {
            $destinationPath = 'regulation/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }
    
        Regulation::create($input);
     
        return back()->with('status', 'Regulation create success !');
    }

    public function regulation_edit (Regulation $regulation) {
        return view('adm.regulation-edit', compact('regulation'));
    }

    public function update(Request $request, Regulation $regulation) {
   
        $request->validate([
            'title'   => 'required',
            'file'   => 'mimes:pdf',
        ]);
  
        $input = $request->all();
  
        if ($file = $request->file('file')) {
            \File::delete(public_path('regulation/'.$regulation->file));
            $destinationPath = 'regulation/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }
          
        $regulation->update($input);
    
        return back()->with('status', 'Update sop success !');
    }

    public function delete(Regulation $regulation){
        \File::delete(public_path('regulation/'.$regulation->file));
        $regulation->delete();
        $regulation = Regulation::latest()->get();
        return back()->with('status', 'Delete regulation success !');
    }
}
