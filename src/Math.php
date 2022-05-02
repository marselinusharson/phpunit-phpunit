<?php
namespace Marselinus\Test{

    class Math{

        static public function sum(array $values):int{
            
            $sum = 0;

            foreach($values as $value){
                $sum += $value; 
            }

            return $sum;
        }
    }
}