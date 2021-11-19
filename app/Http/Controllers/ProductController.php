<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('id', $id)->firstOrFail();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = array(
            'itemlist' =>  Category::with('products')->get()
          );
        return view('product.create', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'webName' => 'required',
            'slug' => 'required',
            'brand' => 'required',
            'colour' => 'required',
            'fullDescription' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'imagePath' => 'required',
            'visibleToCustomer' => 'required',
            'weight' => 'required',
            'vatRate' => 'required',
            'barCode' => 'required'
        ]);
    
        Product::create($request->all());
        // $image = Str::of($data[26])->explode('|');
     
        return redirect()->route('categories.index')
                        ->with('success','category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  Product::find($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = array(
            'itemlist' =>  Category::with('products')->get()
          );

        $product =  Product::where('id', $id)->firstOrFail();
        return view('product.edit', compact('product'), $items);
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
            'webName' => 'required',
            'slug' => 'required',
            'brand' => 'required',
            'colour' => 'required',
            'fullDescription' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'imagePath' => 'required',
            'visibleToCustomer' => 'required',
            'weight' => 'required',
            'barCode' => 'required'
            
        ]);

        $product = Product::find($id);
        $product->webName = $request->input('webName');
        $product->slug = $request->input('slug');
        $product->brand = $request->input('brand');
        $product->colour = $request->input('colour');
        $product->fullDescription = $request->input('fullDescription');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->imagePath = $request->input('imagePath');
        $product->visibleToCustomer = $request->input('visibleToCustomer');
        $product->weight = $request->input('weight');
        $product->barCode = $request->input('barCode');
        $product->save();

        Session::flash('success', 'product updated successfully.');

        return redirect()->route('categories.index');
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
        $product->delete();

        return redirect()->route('categories.index')
            ->with('success', 'product deleted successfully');
    }
}
