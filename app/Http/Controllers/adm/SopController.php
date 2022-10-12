<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function index(){
        $sops = Sop::latest()->get();
        return view('adm.sop', compact('sops'));
    }

    public function sop_add () {
        return view('adm.sop-add');
    }

    public function create(Request $request){
        $request->validate([
            'sop_title'   => 'required',
            'file'   => 'required|mimes:pdf',
            'form'   => 'mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf',
        ]);
  
        $input = $request->all();
  
        if ($file = $request->file('file')) {
            $destinationPath = 'sop/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }

        if ($form = $request->file('form')) {
            $destinationPath = 'form/';
            $profileImage = date('YmdHis') . "." . $form->getClientOriginalExtension();
            $form->move($destinationPath, $profileImage);
            $input['form'] = "$profileImage";
        }
    
        Sop::create($input);
     
        return back()->with('status', 'Create sop success !');
    }

    public function sop_edit (Sop $sop) {
        return view('adm.sop-edit', compact('sop'));
    }

    public function update(Request $request, Sop $sop) {
   
        $request->validate([
            'sop_title'     => 'required',
            'file'          => 'mimes:pdf',
            'form'          => 'mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,pdf',
        ]);
  
        $input = $request->all();
  
        if ($file = $request->file('file')) {
            \File::delete(public_path('sop/'.$sop->file));
            $destinationPath = 'sop/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }else{
            unset($input['file']);
        }

        if ($form = $request->file('form')) {
            \File::delete(public_path('form/'.$sop->form));
           $destinationPath = 'form/';
            $profileImage = date('YmdHis') . "." . $form->getClientOriginalExtension();
            $form->move($destinationPath, $profileImage);
            $input['form'] = "$profileImage";
        }else{
            unset($input['form']);
        }
          
        $sop->update($input);
    
        return back()->with('status', 'Update sop success !');
    }

    public function delete(Sop $sop){
        \File::delete(public_path('sop/'.$sop->file));
        \File::delete(public_path('form/'.$sop->form));
        $sop->delete();
        $sop = Sop::latest()->get();
        return back()->with('status', 'Delete sop success !');
    }
}
