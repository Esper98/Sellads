<?php
/*
 * Project: Sellads
 * File: app/Http/Controllers/Back/ProductController.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Controllers\Back;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller

{

    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::All();
        $data['categories'] = Category::All();
        return view('back.product.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::All();
        return view('back.product.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->category_name = $request['category'];
        if ($request->hasFile('image')) {
            $tempImage = $request->image;
            $tempImage->move('img', $tempImage->getClientOriginalName());
            $product->image = $tempImage->getClientOriginalName();
        } 
        $product->save();

        return redirect('/admin/producten')->with('success', 'Nieuw product is met succes toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::Find($id);
        $data['categories'] = Category::All();
        return view('back.product.edit', compact('data', 'id'));
                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $product = Product::find($id);

        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->category_name = $request['category'];
        if ($request->hasFile('image')) {
            $tempImage = $request->image;
            $tempImage->move('img', $tempImage->getClientOriginalName());
            $product->image = $tempImage->getClientOriginalName();
        } 

        $product->update();

        return redirect('/admin/producten')->with('success', 'Product is met succes gewijziged.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->delete(); 
        

        return redirect('/admin/producten')->with('success', 'Product is met succes Verwijderd.');
    }
}
