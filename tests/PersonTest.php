<?php
namespace Marselinus\Test{

    use PHPUnit\Framework\TestCase;

    class PersonTest extends TestCase{

        // vendor\bin\phpunit.bat tests\PersonTest.php 

        private Person $person;

        // fixture
        protected function setUp():void
        {
            // $this->person = new Person("Marsel");
        }

        /**
         * @before
         */
        public function createPerson()
        {
            $this->person = new Person("Marsel");

        }


        public function testSuccess(){
            // $person = new Person("Marsel");
            self::assertEquals("Hello Dinda, My name is Marsel", $this->person->sayHello("Dinda"));
        }

        public function testException(){

            // $person = new Person("Dinda");
            $this->expectException(\Exception::class);
            $this->person->sayHello(null);

        }

        public function testOutput(){
            // $person = new Person("Marsel");
            $this->expectOutputString("Good Bye Dinda".PHP_EOL);
            $this->person->sayGoodBye("Dinda");

        }
        //vendor\bin\phpunit.bat --filter PersonTest::testOutput tests\PersonTest.php

    }

}
?>