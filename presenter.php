<?php

require_once 'data_transfer_objects/output.php';

interface UserIndexPresenterInterface
{
    public function complete(UserIndexOutputData $outputData);
}

class UserIndexViewModel
{
    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }
}

class UserIndexPresenter implements UserIndexPresenterInterface
{
    public function complete(UserIndexOutputData $outputData)
    {
        $users = $outputData->users;
        if (empty($users)) {
            echo "ユーザーが登録されていません\n";
        } else {
            $model = new UserIndexViewModel($users);
            echo "ユーザー一覧\n";
            foreach ($model->users as $user) {
                echo $user->name . "\n";
            }
        }
    }
}

interface UserCreatePresenterInterface
{
    public function complete(UserCreateOutputData $outputData);
}

class UserCreateViewModel
{
    public $created_at;

    public function __construct($created_at)
    {
        $this->created_at = $created_at;
    }
}

class UserCreatePresenter implements UserCreatePresenterInterface
{
    public function complete(UserCreateOutputData $outputData)
    {
        $created_at = $outputData->created_at;
        $created_at_text = $created_at->format('Y年m月d日');
        $model = new UserCreateViewModel($created_at_text);
        echo "保存されました\n" . "created_at: " . $model->created_at . "\n";
    }
}
