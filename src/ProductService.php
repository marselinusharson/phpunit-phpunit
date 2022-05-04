<?php

namespace Marselinus\Test
{
    class ProductService
    {

        public function __construct(private ProductRepository $repository)
        {
            
        }

        public function register(Product $product): Product
        {
            if($this->repository->findById($product->getId()) != null)
            {
                throw new \Exception("Product is already exist");
            }

            return $this->repository->save($product);
        }

        public function delete(string $id) :void
        {
            $product = $this->repository->findById($id);
            if($product == null){
                throw new \Exception("product is not found");
            }
            // $this->repository->delete($product);
            $this->repository->delete($product);
        }
    }
}
