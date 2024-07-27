<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function indexAction()
    {
        $products = Product::all()->toArray();

        return view('products', ['products' =>$products]);
    }

    public function createProductAction(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');

        // валидация
        $request ->validate(['name' =>'required|max:255|unique:products', 'price' => 'required|numeric|int']);
        $product = new Product;
        $product->name = $name;
        $product->price = $price;

        if (!$product->save()) {
            return $this->renderError('OOPS ERROR');
        }

        return redirect()->route('products');
    }


    public function showCreateNewProductFormAction()
    {
        return view('create_product_form');
    }

    public function showDeleteOrUpdateFormAction()
    {
        $products = Product::all()->toArray();
        return view('delete_and_update_form', ['products' =>$products]);
    }

    public function deleteProductAction(Request $request)
    {
        $id = $request->input('id');
        Product::destroy($id);
        return redirect()->route('update_form');
    }

    public function updateProductAction(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $product = Product::find($id);
        if ($product->name = $name) {
            $request->validate(['price' => 'required|numeric|int']);
        } else {
            $request->validate(['name' => 'required|max:255|unique:products', 'price' => 'required|numeric|int']);
        }
        $product->name = $name;
        $product->price = $price;
        $product->save();

        return redirect()->route('update_form');

    }

}
