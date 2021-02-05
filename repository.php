<?php

interface UserRepositoryInterface
{
    public function save(User $user) : void;
}

class UserRepository implements UserRepositoryInterface
{
    private $db = [];

    public function save(User $user) : void
    {
        $this->db[] = $user;
    }
}