<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        $productsDB = Product::pluck('name', 'id');
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
    public function store(Request $request)
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
        $productsDB = Product::pluck('name', 'id');
        $products = [];
        foreach ($productsDB as $key => $productDB) {
            $products[$key] = $productDB . ' ( ID: ' . $key . ' )';
        }
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotion.edit', compact('promotion', 'products'));
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
    public function destroy(Request $request, $id)
    {
        //
        if (!$request->input('ids')) {
            session()->flash('error', 'Delete Error: Please select at least one checkbox!');
            return back();
        }
        $deleted = Promotion::destroy($request->input('ids'));
        if ($deleted == count($request->input('ids')))
            session()->flash('notify', 'Delete success!');
        else
            session()->flash('error', 'Some items can not be deleted!');
        return back();
    }
}
