<?php


namespace App\Service;
use App\Models\Product;
use App\Models\ProductRepository;

class ProductService
{
    private ProductRepository $productsRepository;

    public function __construct(ProductRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function create(int $id, string $name, string $price): bool
    {
        $product = new Product($id, $name, $price);

        try {
            $this->productsRepository->create($product);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function update($id, $name, $price): bool
    {
        try {
            $this->productsRepository->update($id, $name, $price);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function delete($id): bool
    {
        try {
            $this->productsRepository->delete($id);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
