<?php
namespace App\Models;
use App\Models\Product;

class ProductRepository
{
    const PATH_TO_FILE = __DIR__ . '/../../tmp/products.json';


    public function getAll()
    {
        $rawProducts = file_get_contents(self::PATH_TO_FILE);
        $products = [];
        foreach (json_decode($rawProducts, true) as $product) {
            $products[] = new Product($product['id'], $product['name'], $product['price']);
        }
        return $products;
    }

    public function create(Product $product)
    {


        $rawProduct = json_decode(file_get_contents(self::PATH_TO_FILE), true);
        $rawProduct[] = $product->toArray();
        file_put_contents(self::PATH_TO_FILE, json_encode($rawProduct));
    }

    public function delete(int $id)
    {

        $rawProduct = json_decode(file_get_contents(self::PATH_TO_FILE), true);
        foreach ($rawProduct as $item => $value) {
            if ($value['id'] === $id) {
                unset($rawProduct[$item]);
            }
        }
        file_put_contents(self::PATH_TO_FILE, json_encode($rawProduct));

    }

    public function update(int $id, string $name, int $price)
    {
        $rawProduct = json_decode(file_get_contents(self::PATH_TO_FILE), true);

        foreach ($rawProduct as $item => &$value) {
            if ($value['id'] === $id) {
                if ($name !== $value['name']) {
                    $value['name'] = $name;
                }
                if ($price !== $value['price']) {
                    $value['price'] = $price;
                }
            }
        }
        file_put_contents(self::PATH_TO_FILE, json_encode($rawProduct));

    }
}
