<?php

require_once 'domain.php';
require_once 'data_transfer_objects/input.php';

interface UserIndexUseCaseInterface
{
    public function handle();
}

class UserIndexInteractor implements UserIndexUseCaseInterface
{
    private $userRepository;
    private $presenter;
    
    public function __construct(UserRepositoryInterface $userRepository, UserIndexPresenter $presenter) {
        $this->userRepository = $userRepository;
        $this->presenter = $presenter;
    }
    
    public function handle()
    {
        $users = $this->userRepository->all();
        $outputData = new UserIndexOutputData($users);
        $this->presenter->complete($outputData);
    }
}
interface UserCreateUseCaseInterface
{
    public function handle(UserCreateInputData $input);
}

class UserCreateInteractor implements UserCreateUseCaseInterface
{
    private $userRepository;
    private $presenter;

    public function __construct(UserRepositoryInterface $userRepository, UserCreatePresenter $presenter)
    {
        $this->userRepository = $userRepository;
        $this->presenter = $presenter;
    }
    public function handle(UserCreateInputData $input)
    {
        $name = $input->name;
        $user = new User($name);
        $this->userRepository->save($user);

        $outputData = new UserCreateOutputData(new DateTime('now'));
        $this->presenter->complete($outputData);
    }
}