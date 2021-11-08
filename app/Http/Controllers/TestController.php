<?php

namespace App\Http\Controllers;

use App\Models\Testmodel\NewpageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TestController extends Controller
{
    //
    public function index()
    {
        # code...
        $page = NewpageModel::all();
        return view('admin.pages.testpage.index',compact('page'));
    }
    public function create()
    {
        # code...
        return view('admin.pages.testpage.newpage');
    }
    public function createPage(Request $request)
    {
        # code...

        $db_page = new NewpageModel;
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:pages,slug'
        ]);
        $db_page->name =$request->name;
        $db_page->slug = Str::slug($request->slug);
        $db_page->description = $request->short_description;
        $db_page->content = $request->content;

        $db_page->save();
        return redirect('newpage');
    }
    public function show($slug)
    {
        # code...
        $page = NewpageModel::where('slug',$slug)->get();

        return view('admin.pages.testpage.show',compact('page'));

    }
    public function edit($slug)
    {
        $page = NewpageModel::where('slug',$slug)->get();

        return view('admin.pages.testpage.edit',compact('page','slug'));
        # code...

    }
    public function postedit($slug, Request $request)
    {

        $db_page = NewpageModel::where('slug',$slug)->first();
        $request->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);
        $db_page->name =$request->name;
        $db_page->slug = Str::slug($request->slug);
        $db_page->description = $request->short_description;
        $db_page->content = $request->content;

        $db_page->save();
        # code...
        return redirect('newpage');
    }
    public function delete($slug)
    {
        # code...
        $page = NewpageModel::where('slug',$slug)->delete();
        return redirect('newpage');
    }

}
