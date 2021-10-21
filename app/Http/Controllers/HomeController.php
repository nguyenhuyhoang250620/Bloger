<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $use = Company::all();
        return view('taothanhvien',compact('use'));
    }
    public function timkiem(){
        return view('searched.search');
    }
    public function paging(Request $request)
    {
        $columns = array(
            0 => 'stt',
            1 => 'title',
            2 => 'created_at',
        );//dung de sap xep theo ten cot
  
        $totalData = News::count();
  
        $totalFiltered = $totalData;
  
        $limit = $request->input('length');//số lượng record hiển thị trong 1 trang,mặc định là 10
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];//lấy tên column sắp xếp
        $dir   = $request->input('order.0.dir');//desc or asc
  
        if (empty($request->input('search.value')))//lấy data từ ô search trong table
        {
            $news = News::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
  
            $news = News::where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
  
            $totalFiltered = News::where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->count();
        }
  
        $data = array();
        if (!empty($news)) {
            foreach ($news as $item) {
  
                $nestedData['stt']         = '';
                $nestedData['title']      = $item->title;
                $nestedData['created_at'] = date('j M Y h:i a', strtotime($item->created_at));
                $data[] = $nestedData;
  
            }
        }
  
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
        );
  
        echo json_encode($json_data);
    }

}
