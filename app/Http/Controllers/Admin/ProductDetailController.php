<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductDetail\ProductDetailStoreRequest;
use App\Http\Requests\ProductDetail\ProductDetailUpdateRequest;
use App\Http\Requests\ProductDetail\ProductDetailDestroyRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productDetails = ProductDetail::all();
        return view('admin.product.productDetail.index', compact('productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $productID = $request->input('product_id');
        $productName = Product::findOrFail($productID)->name . ' ( ID: ' . $productID . ' )';
        return view('admin.product.productDetail.create', compact('productName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDetailStoreRequest $request)
    {
        //
        $productDetail = new ProductDetail;
        $productDetail->fill($request->all());
        $productDetail->save();
        $request->session()->flash('notify', 'Create success!');
        return redirect()->route('product.edit', $request->input('product_id'));
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
        //
        $productDetail = ProductDetail::with('product')->findOrFail($id);
        $productNameAndID = $productDetail->product->name . ' ( ID: ' . $productDetail->product->id . ' )';
        return view('admin.product.productDetail.edit', compact('productDetail', 'productNameAndID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductDetailUpdateRequest $request, $id)
    {
        //
        $productDetail = ProductDetail::findOrFail($id);
        $productDetail->fill($request->all());
        $productDetail->save();
        $request->session()->flash('notify', 'Update Success!');
        return redirect()->route('product.edit', $productDetail->product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetailDestroyRequest $request, $id)
    {
        //
        $deleted = ProductDetail::destroy($request->input('ids'));
        if ($deleted == count($request->input('ids')))
            session()->flash('notify', 'Delete success!');
        else
            session()->flash('error', 'Some items can not be deleted!');
        return back();
    }
}
