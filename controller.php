<?php

class UserController
{
    private UserCreateUseCaseInterface $interactor;

    public function __construct(UserCreateUseCaseInterface $interactor)
    {
        $this->interactor = $interactor;
    }
    public function create($user_name)
    {
        $input_data = new UserCreateInputData($user_name);
        $this->interactor->handle($input_data);
    }
}
