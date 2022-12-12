<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function paginateProducts(Request $request){
        $limit          =   (request('length') != '') ? request('length') : 10;
        $offset         =   (request('start') != '') ? request('start') : 0;
        
        $products       =   Product::where('is_active', 1)->orderBy('id', 'desc');
        $result['count']=   $products->count();
        $result['data'] =   $products->get();
        $data           =   ["iTotalDisplayRecords" => $result['count'], "iTotalRecords" => $limit, "TotalDisplayRecords" => $limit];
        $data['data']   =   $result['data'];
        return response()->json($data);
    }

    public function viewProduct($id){
        $product        =   Product::where('id', $id)->where('is_active', 1)->first();
        if($product){
            $product    =  $product->toArray();
        }else{
            $product    =   [];
        }
        return view('products.view')->with(compact('product'));
    }
}
