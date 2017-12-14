<?php
namespace Itb;

class MainController
{
    private $twig;
    private $userController;
    private $sessionManager;

    public function __construct($twig, $sessionManager)
    {
        $this->twig = $twig;
        $this->sessionManager = $sessionManager;
        $this->userController = new UserController($twig, $sessionManager);
    }

    public function indexAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'index.html.twig';
        $argsArray = [
            'pageTitle' => 'index',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];
        $html =  $this->twig->render($template, $argsArray);
        print $html;
    }

    public function gameplayAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'gameplay.html.twig';
        $argsArray = [
            'pageTitle' => 'gameplay',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];
        $html =  $this->twig->render($template, $argsArray);
        print $html;
    }

    public function adminAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'admin.html.twig';
        $argsArray = [
            'pageTitle' => 'admin',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];
        $html =  $this->twig->render($template, $argsArray);
        print $html;
    }



    public function devAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'dev.html.twig';
        $argsArray = [
            'pageTitle' => 'dev',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];
        $html =  $this->twig->render($template, $argsArray);
        print $html;
    }

    public function loginAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $template = 'login.html.twig';
        $argsArray = [
            'pageTitle' => 'UsersRepository',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];
        $html =  $this->twig->render($template, $argsArray);
        print $html;
    }

    public function shopAction()
    {
        $isLoggedIn = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();

        $shopRepository = new ShopRepository();
        $names = $shopRepository->getAll();


        $template = 'shop.html.twig';
        $argsArray = [
            'pageTitle' => 'shop',
            'names' => $names,
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ];
        $html =  $this->twig->render($template, $argsArray);
        print $html;

    }


    public function logoutAction()
    {
        $this->sessionManager->killSession();
        $this->indexAction();
    }
    public function setupAction(){
        include_once __DIR__.'/../setup/setup_database.php';
    }


}
