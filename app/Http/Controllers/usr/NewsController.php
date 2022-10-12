<?php

namespace App\Http\Controllers\usr;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index (Request $request){
        $search =  $request->search;
        if(!$search){
            $news = News::latest()->get();
        }
        else{
            $news = News::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
            })->get();
            
        }
        return view('usr.news', compact('news'));
    }

    public function detail(News $news){
        return view('usr.news-detail', compact('news'));
    }
}
