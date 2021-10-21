<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;


class SearcheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = News::all();
        return view('searched.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('searched.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required'
        // ]);

        $messages = [
            'title.required' => 'Cần nhập đầy đủ tên công ty',
        ];
        $this->validate($request, [
            'title' => 'required',
        ], $messages);
        News::create($request->all());
        return redirect()->route('searched.index')->with('success', 'tao thanh cong');
    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $post)
    {
        return view('searched.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $post,$id)
    {
        $post = News::find($id); 
        return view('searched.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $post = News::find($id);
        $post->title = $request->title;
        $post->save();



        return redirect()->route('searched.index')->with('success', 'Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = News::find($id);
        $post->delete();
        return redirect()->route('searched.index')->with('success', 'Company has been deleted successfully');
    }
}
