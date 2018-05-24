<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoriesDB = Category::pluck('name', 'id');
        $categories = [];
        foreach ($categoriesDB as $key => $category) {
            $categories[$key] = $category . ' ( ID: ' . $key . ' )';
        }
        return view('admin.product.create', compact('categories'));
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
        $product = new Product;
        $product->fill($request->all());
        $product->save();
        $product->img = $this->saveImg($request, $product->id);
        $product->save();
        $request->session()->flash('notify', 'Create Success!');
        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);
        $categoriesDB = Category::pluck('name', 'id');
        $categories = [];
        foreach ($categoriesDB as $key => $category) {
            $categories[$key] = $category . ' ( ID: ' . $key . ' )';
        }
        return view('admin.product.edit', compact('product', 'categories'));
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
        $product = Product::findOrFail($id);
        $product->fill($request->except('img'));
        if($request->hasFile('img')) {
            Storage::disk('uploads')->delete('img/medium/' . $product->img);
            Storage::disk('uploads')->delete('img/large/' . $product->img);
            $product->img = $this->saveImg($request, $id);
        }
        $product->save();
        $request->session()->flash('notify', 'Update Success!');
        return redirect()->route('product.index');
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
        $deleted = Product::destroy($request->input('ids'));
        if ($deleted == count($request->input('ids')))
            session()->flash('notify', 'Delete success!');
        else
            session()->flash('error', 'Some items can not be deleted!');
        return back();
    }

    public function saveImg($request, $productID)
    {
        $image = $request->file('img');
        $extension = \File::extension($image->getClientOriginalName());
        $fileName = $productID . '.' . $extension;
        $imageMedium = Image::make($image->getRealPath());
        $imageMedium->resize(240, 240);
        $imageMedium->save(public_path('img/medium/' . $fileName));

        $imageLarge = Image::make($image->getRealPath());
        $imageLarge->resize(600, 600);
        $imageLarge->save(public_path('img/large/' . $fileName));
        return $fileName;
    }
}
