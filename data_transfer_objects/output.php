<?php

class UserCreateOutputData {
    public $created_at;

    public function __construct($created_at)
    {
        $this->created_at = $created_at;
    }
}