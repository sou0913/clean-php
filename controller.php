<?php

class UserIndexController
{
    private UserIndexUseCaseInterface $interactor;

    public function __construct(UserIndexUseCaseInterface $interactor)
    {
        $this->interactor = $interactor;
    }

    public function index()
    {
        $this->interactor->handle();
    }
}

class UserCreateController
{
    private UserCreateUseCaseInterface $interactor;

    public function __construct(UserCreateUseCaseInterface $interactor)
    {
        $this->interactor = $interactor;
    }

    public function create($userName)
    {
        $inputData = new UserCreateInputData($userName);
        $this->interactor->handle($inputData);
    }
}
