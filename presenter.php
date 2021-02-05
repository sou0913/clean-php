<?php

require_once 'data_transfer_objects/output.php';

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
