<?php

namespace App\Http\Controllers\usr;

use App\Http\Controllers\Controller;
use App\Models\Sop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;

class SopController extends Controller
{
    public function index (Request $request){
        $search =  $request->search;
        if(!$search){
            $sops = Sop::latest()->get();
        }
        else{
            $sops = Sop::where(function ($query) use ($search){
                $query->where('sop_title', 'like', '%'.$search.'%');
            })->get()
            ;
        }
        return view('usr.sop', compact('sops'));
    }

    public function detail (Sop $sop){
        return view('usr.sop-detail', compact('sop'));
    }

    public function pdfView($sop) {
        $document = Sop::findOrFail($sop);

        $filePath = "/sop/".$document->file;

        // file not found
        if( ! Storage::exists($filePath) ) {
            abort(404);
        }

        $pdfContent = Storage::get($filePath);

        // for pdf, it will be 'application/pdf'
        $type       = Storage::mimeType($filePath);
        $fileName   = Storage::name($filePath);

        return Response::make($pdfContent, 200, [
        'Content-Type'        => $type,
        'Content-Disposition' => 'inline; filename="'.$fileName.'"'
        ]);
    }

    public function downloadfile(Sop $sop)
    {
        $filepath = public_path('form/'.$sop->form);
        return Response::download($filepath); 
    }
}
