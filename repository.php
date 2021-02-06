<?php

interface UserRepositoryInterface
{
    public function save(User $user) : void;

    public function all() : array;
}

class UserRepository implements UserRepositoryInterface
{
    private $db = [];

    public function save(User $user) : void
    {
        $this->db[] = $user;
    }

    public function all() : array
    {
        $all = [];
        foreach($this->db as $user) {
            $all[] = clone($user);
        }
        return $all;
    }
}