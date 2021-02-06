<?php
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
        echo "項目を選択してください\n";
        echo "1. 一覧表示\n";
        echo "2. ユーザー登録\n";
        echo "(1 or 2) > ";
        $choice = (int)trim(fgets(STDIN));

        switch ($choice) {
            case 1:
                $repository = new UserRepository();
                $presenter  = new UserIndexPresenter();
                $interactor = new UserIndexInteractor($repository, $presenter);
                $controller = new UserIndexController($interactor);

                $controller->index();
                break;
            case 2:
                echo "ユーザー名を入力してください\n";
                $username = trim(fgets(STDIN));

                $repository = new UserRepository();
                $presenter  = new UserCreatePresenter();
                $interactor = new UserCreateInteractor($repository, $presenter);
                $controller = new UserCreateController($interactor);
        
                $controller->create($username);
                break;
            default:
                break;
        }

    }
}

$app = new App;
$app->start();
