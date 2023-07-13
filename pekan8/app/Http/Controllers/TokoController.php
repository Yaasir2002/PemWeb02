<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;

class TokoController extends Controller
{
    public function index()
    {
        return view ('toko/index');
    }

    public function detail()
    {
        return view ('toko/detail');
    }

    public function admin()
    {
        $products = Product::all(); 
        return view ('toko/admin', compact('products'));
    }

    public function create()
    {
        return view('toko/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' =>'required',
            'description' =>'required',
        ]);

        Product::create($request->all());
        return redirect()->route('produk.admin')->with('success','Product created successfully');
    }

    public function pelanggan ()
    {
        $customers = Customer::all();
        return view('toko/pelanggan',compact('customers'));
    }

    public function tambahPelanggan ()
    {
        return view('toko/tambahPelanggan');
    }

    public function tb (Request $request)
    {
        $request->validate([
            'name' =>'required',
            'address' =>'required',
            'no_hp' =>'required',
        ]);

        Customer::create($request->all());
        return redirect()->route('produk.pelanggan')->with('success','Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('toko/edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' =>'required',
            'price' =>'required',
            'description' =>'required'
        ]);
        $product->update($request->all());
        return redirect()->route('produk.admin')->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('produk.admin')->with('success','Product delete successfully');
    }
    
}
