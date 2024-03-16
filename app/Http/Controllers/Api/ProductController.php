<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh");
        $data =  Product::with('images')->get();
        //$ids =  Product::get()->pluck('id');
//
        
        return response()->json(['status' => 'success', 'data' => $data]);
        }
    //    public function imageProducts()
    //    {
    //        //dd("hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh");
    //        //$data =  Product::with('images')->get();
    //        $ids =  Product::get()->pluck('id');
    ////
            
    //        return response()->json(['status' => 'success', 'data' => $data]);
    //        }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  
    public function show($id)
    {
        $product =  Product::with('images')->findOrFail($id);

        return response()->json(['status' => 'success', 'data' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}