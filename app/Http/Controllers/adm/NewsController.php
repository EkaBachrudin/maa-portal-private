<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(){
        $news = News::latest()->get();
        return view('adm.news', compact('news'));
    }

    public function news_add(){
        return view('adm.news-add');
    }

    public function create(Request $request){
        $request->validate([
            'title'   => 'required',
            'short'   => 'required',
            'content' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'news/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $input['publish'] = Auth::user()->name;
    
        News::create($input);
     
        return back()->with('status', 'Create news success !');
    }

    public function news_edit(News $news){
        return view('adm.news-edit', compact('news'));
    }

    public function update(Request $request, News $news) {
   
        $request->validate([
            'title'   => 'required',
            'short'   => 'required',
            'content' => 'required',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            \File::delete(public_path('news/'.$news->image));
            $destinationPath = 'news/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $news->update($input);
    
        return back()->with('status', 'Update news success !');
    }

    public function delete(News $news){
        \File::delete(public_path('news/'.$news->image));
        $news->delete();
        $news = News::latest()->get();
        return back()->with('status', 'Delete news success !');
    }
}
