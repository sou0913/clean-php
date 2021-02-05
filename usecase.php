<?php

require_once 'domain.php';
require_once 'data_transfer_objects/input.php';

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

        $output_data = new UserCreateOutputData(new DateTime('now'));
        $this->presenter->complete($output_data);
    }
}