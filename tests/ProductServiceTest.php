<?php

namespace Marselinus\Test
{

    use PHPUnit\Framework\TestCase;

    use function PHPUnit\Framework\assertSame;

    class ProductServiceTest extends TestCase
    {
        private ProductRepository $repository;
        private ProductService $service;

        protected function setUp(): void
        {
            $this->repository = $this->createStub(ProductRepository::class);
            $this->service = new ProductService($this->repository);

        }

        public function testStub()
        {
            $product = new Product();
            $product->setId("1");

            $this->repository->method("findById") 
                ->willReturn($product);

            $result = $this->repository->findById("1");

            self::assertSame($product, $result);
        }

        public function testStubMap()
        {
            // vendor\bin\phpunit.bat --filter ProductServiceTest::testStubMap tests\ProductServiceTest.php

            $product1 = new Product();
            $product1->setId("1");

            $product2 = new Product();
            $product2->setId("2");

            $map = [
                ["1", $product1],
                ["2", $product2],
            ];

            $this->repository->method("findById")
                ->willReturnMap($map);
            
            self::assertSame($product1, $this->repository->findById("1"));
            self::assertSame($product2, $this->repository->findById("2"));
        }

        public function testStubCallBack()
        {
            $this->repository->method("findById")
                ->willReturnCallBack(function (string $id){
                    $product = new Product();
                    $product->setId($id);

                    return $product;
                });
            
            self::assertEquals("1", $this->repository->findById("1")->getId());
            self::assertEquals("2", $this->repository->findById("2")->getId());
            self::assertEquals("3", $this->repository->findById("3")->getId());
            self::assertEquals("4", $this->repository->findById("4")->getId());
        }


        public function testDelete()
        {
            // vendor\bin\phpunit.bat --filter ProductServiceTest::testDelete tests\ProductServiceTest.php

            $product = new Product();
            $product->setId("1");

            
            $this->repository->method("findById")
                ->willReturn($product);
            $this->service->delete("1");
            self::assertTrue(true,"succes delete");
        }

        public function testDeleteException()
        {
            self::expectException(\Exception::class);
            $this->repository->method("findById")
                ->willReturn(null);
            
                $this->service->delete("1");

        }

    }
}