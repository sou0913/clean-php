<?php

// TODO: これはDomainで合ってる？

class User {
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}