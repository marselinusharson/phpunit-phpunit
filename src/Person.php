<?php

namespace Marselinus\Test{

    class Person{
        public function __construct(private string $name){}

        public function sayHello(?string $name){
            if($name == null) throw new \Exception("Name is Null");

            return "Hello $name, My name is $this->name";
        }


        public function sayGoodBye(?string $name):void{
            echo "Good Bye $name".PHP_EOL;
        }
    }
}

?>