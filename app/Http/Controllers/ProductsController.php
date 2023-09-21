<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products=product::latest()->paginate(5);

        return view("products.index", compact("products"))->with("i",(request()->input("page",1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'details'=> 'required'
        ]);

        product::create($request->all());

        return redirect()->route('products.index')->with('success','a product was registered successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(product $product): View
    {
      return view("products.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product): View
    {
        return view("products.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product): RedirectResponse
    {
    //    dd($product);

        $request->validate([
            'name'=>'required',
            'Details'=>'required'
        ]);
        
        dd($request->name);
        dd($request->Details);


        $product->update($request->all());

        return redirect()->route('products.index')->with('success','the product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'The product was deleted successfully');
    }
}
