<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);

        return view('products.list', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->descriptionEnglish = $request->get('descriptionEnglish');
        $product->descriptionRussian = $request->get('descriptionRussian');
        $product->priceRub = $request->get('priceRub');
        $product->priceUsd = $request->get('priceUsd');
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if(isset($product)) {
            return view('products.edit', [
                'product' => $product
            ]);
        } else {
            return response(view('404'), 404);
        }

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
        $product = Product::find($id);

        if(isset($product)) {
            $product->name = $request->get('name');
            $product->descriptionEnglish = $request->get('descriptionEnglish');
            $product->descriptionRussian = $request->get('descriptionRussian');
            $product->priceRub = $request->get('priceRub');
            $product->priceUsd = $request->get('priceUsd');
            $product->save();

            return redirect(route('products.index'));
        } else {
            return response(view('404'), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(isset($product)) {
            $product->delete();

            return redirect(route('products.index'));
        } else {
            return response(view('404'), 404);
        }
    }
}
