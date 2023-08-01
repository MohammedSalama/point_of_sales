<?php

namespace Pos\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pos\Category\Models\Category;
use Pos\Product\Models\Product;
use Pos\Product\Requests\StoreProductsRequest;
use function redirect;
use function session;
use function trans;
use function view;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.products.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        try {

            product::create([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'price'=>$request->price,
                'category_id'=>$request->category_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', trans('backend/products.Product added successfully') );
            return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pos\Product\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pos\Product\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        $categories = Category::get();
        return view('backend.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Pos\Product\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductsRequest $request, $id)
    {
        $product = Product::findorFail($id);

        try {

            $product->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'price'=>$request->price,
                'category_id'=>$request->category_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', trans('backend/products.The product has been modified successfully'));
            return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pos\Product\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            product::destroy($request->pro_id);
            session()->flash('Deleted', trans('backend/products.The product has been deleted successfully'));
            return redirect('products');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
