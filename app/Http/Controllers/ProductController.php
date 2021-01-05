<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
class ProductController extends Controller
{
    public function index()
    {
     return view('products');
    }

    public function create()
    {
     return view('product.create');
    }
    public  function store(UserRequest $req){

        
        		
        $product = new Product();


        $product->username     = $req->name;
        $product->password     = $req->title;
        $product->employeeName = $req->price;
        $product->contactNo    = $req->stock;


        if($user->save()){
            return redirect()->route('home.employeelist');
        }else{
            return back();
        }

    }

    public function productlist(){
        $products =Product::all();

        return view('home.productlist')->with('products',$products);
    }
}
