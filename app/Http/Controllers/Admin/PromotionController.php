<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Promotion\PromotionStoreRequest;
use App\Http\Requests\Promotion\PromotionUpdateRequest;
use App\Http\Requests\Promotion\PromotionDestroyRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promotions = Promotion::all();
        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productIDsInPromotion = Promotion::pluck('product_id');
        $productsDB = Product::whereNotIn('id', $productIDsInPromotion)->pluck('name', 'id');
        $products = [];
        foreach ($productsDB as $key => $productDB) {
            $products[$key] = $productDB . ' ( ID: ' . $key . ' )';
        }
        return view('admin.promotion.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionStoreRequest $request)
    {
        //
        $promotion = new Promotion;
        $promotion->fill($request->all());
        $promotion->save();
        $request->session()->flash('notify', 'Create success!');
        return redirect()->route('promotion.index');
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
        $promotion = Promotion::findOrFail($id);
        $productIDsInPromotion = Promotion::pluck('product_id');
        foreach ($productIDsInPromotion as $key => $value) {
            if ($value == $promotion->product->id) {
                $productIDsInPromotion->forget($key);
                break;
            }
        }
        $productsDB = Product::whereNotIn('id', $productIDsInPromotion)->pluck('name', 'id');
        $products = [];
        foreach ($productsDB as $key => $productDB) {
            $products[$key] = $productDB . ' ( ID: ' . $key . ' )';
        }
        
        return view('admin.promotion.edit', compact('promotion', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionUpdateRequest $request, $id)
    {
        //
        $promotion = Promotion::findOrFail($id);
        $promotion->fill($request->all());
        $promotion->save();
        $request->session()->flash('notify', 'Update Success!');
        return redirect()->route('promotion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionDestroyRequest $request, $id)
    {
        //
        $deleted = Promotion::destroy($request->input('ids'));
        if ($deleted == count($request->input('ids')))
            session()->flash('notify', 'Delete success!');
        else
            session()->flash('error', 'Some items can not be deleted!');
        return back();
    }
}
