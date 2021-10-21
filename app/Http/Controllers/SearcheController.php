<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Search;

class SearcheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $search = Search::get();
        return view('searched.index', compact('search'));
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
        $search = new Search;
        $search->title = $request->title;
        $search->save();
        return redirect('/searched')->with('success', 'tao thanh cong');
    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        return view('searched.edit', compact('search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        return view('searched.edit', compact('search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $search = Search::find($id);
        $search->title = $request->title;
        $search->save();
        return redirect()->route('searched.index')->with('success', 'Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        $search->delete();
        return redirect()->route('searched.index')->with('success', 'Company has been deleted successfully');
    }
}
