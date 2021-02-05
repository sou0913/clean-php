<?php
// ユーザー保存（プログラム起動中）と一覧照会ができるようにする
require_once 'controller.php';
require_once 'usecase.php';
require_once 'repository.php';
require_once 'presenter.php';


class App
{
    public function start(): void
    {
        echo "=======================================\n";
        echo "Clean Architecture デモ\n";
        echo "=======================================\n";
        echo "\n";
        echo "ユーザー名を入力してください\n";
        $username = trim(fgets(STDIN));

        $repository = new UserRepository();
        $presenter  = new UserCreatePresenter();
        $interactor = new UserCreateInteractor($repository, $presenter);
        $controller = new UserController($interactor);

        $controller->create($username);
    }
}

$app = new App;
$app->start();