<?php

class UserIndexOutputData {
    public array $users;

    public function __construct($users)
    {
        $this->users = $users;
    }
}

class UserCreateOutputData {
    public $created_at;

    public function __construct($createdAt)
    {
        $this->created_at = $createdAt;
    }
}