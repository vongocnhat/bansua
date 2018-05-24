<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Utilities;

class CartController extends Controller
{

    //btn mua click
    public function update(Request $request, $productID, $quantity)
    {
        // $request->session()->forget('products');
        // declare
        $check = false;
        $seProducts = $request->session()->get('products');
        if($seProducts)
            if (array_key_exists($productID, $seProducts)) {
                $check = true;
                $seProduct = $seProducts[$productID];
                $seProduct['quantity'] += $quantity;
                $request->session()->put('products.' . $productID, $seProduct);
            }
        if ($check == false) {
            $productDB = Product::findOrFail($productID);
            $price = $productDB->price;
            $promotion = $productDB->promotion;
            if (isset($promotion))
                if (Utilities::checkPromotionDate($promotion->start, $promotion->end))
                    $price = $promotion->price;
            $product = [
                'product_id' => $productID,
                'name' => $productDB->name,
                'price' => $price,
                'quantity' => 1,
            ];
            $request->session()->put('products.' . $productID, $product);
        }
    }

    public function index()
    {
        return view('ajax.cart_index');
    }

    public function quantityChange(Request $request, $productID, $quantity)
    {
        $seProduct = $request->session()->get('products.' . $productID);
        $seProduct['quantity'] = $quantity;
        $request->session()->put('products.' . $productID, $seProduct);
    }

    public function destroy(Request $request, $productID)
    {
        $request->session()->forget('products.' . $productID);
    }
}
