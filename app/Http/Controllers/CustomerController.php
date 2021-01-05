<?php

namespace App\Http\Controllers;
use App\Models\customer;

use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $movies = customer::latest()->paginate(4);
        return view('customers.index', compact('movies'))->with('i', (request()->input('page', 1) - 1) * 4);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $genres = ['Action', 'Comedy', 'Biopic', 'Horror', 'Drama'];

        return view('products.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required',
            
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
        }

        $data = new customer;
        $data->cemail = $request->title;
        $data->cname = $request->release_year;
        $data->cpass = $request->release_year1;
        $data->poster = $imageName;
        $data->save();
        return redirect()->route('customers.index')->with('success', 'Customer has been added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $genres = ['Action', 'Comedy', 'Biopic', 'Horror', 'Drama'];
        return view('products.edit', compact('product', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'release_year' => 'required',
        ]);

        $imageName = '';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
            $product->poster = $imageName;
        }

        $product->name = $request->title;
        $product->catagory = $request->genre;
        $product->price = $request->release_year;
        $product->update();
        return redirect()->route('products.index')->with('success', 'Product has been updated successfully.');

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($cemail)
    {
         $customer = customers::findOrFail($cemail);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Product has been deleted successfully.');
    
    }
}
