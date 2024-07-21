<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRepository;
use App\Service\ProductService;

class ProductController extends Controller
{
    public function indexAction()
    {
        $repository = new ProductRepository();
        $products = $repository->getAll();

        return view('products', ['products' =>$products]);
    }

    public function createProductAction(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');

        // валидация
        if (!$id || !$name || !$price) {
            return $this->renderError('Fill all forms');
        }

        $repository = new ProductRepository();
        $service = new ProductService($repository);

        if (!$service->create($id, $name, $price)) {
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
        $repository = new ProductRepository();
        $products = $repository->getAll();
        return view('delete_and_update_form', ['products' =>$products]);
    }

    public function deleteProductAction(Request $request)
    {
        $id = $request->input('id');
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $service->delete($id);
        return redirect()->route('update_form');
    }

    public function updateProductAction(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $service->update($id, $name, $price);
        return redirect()->route('update_form');

    }

}
