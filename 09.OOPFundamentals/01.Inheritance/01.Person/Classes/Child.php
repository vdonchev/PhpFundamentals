<?php


namespace Classes;


class Child extends Person
{
    protected function setAge(int $age)
    {
        if ($age >= 15) {
            throw new \Exception("Child’s age must be less than 15!");
        }

        parent::setAge($age);
    }
}