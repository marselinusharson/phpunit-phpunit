<?php

namespace Marselinus\Test
{

    use PHPUnit\Framework\TestCase;

    use function PHPUnit\Framework\assertSame;

    class ProductServiceMockTest extends TestCase
    {
        private ProductRepository $repository;
        private ProductService $service;

        protected function setUp(): void
        {
            $this->repository = $this->createMock(ProductRepository::class);
            $this->service = new ProductService($this->repository);

        }

        public function testMock()
        {
            $product = new Product();
            $product->setId("1");

            $this->repository->expects(self::once())
                ->method("findById")
                ->willReturn($product);
            
            $result = $this->repository->findById("1");
            self::assertSame($product, $result);
            // $result = $this->repository->findById("1");
        }

    }
}