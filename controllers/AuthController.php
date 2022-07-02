<?php

namespace app\controllers;

use phyohtetaung\phpmvc\Application;
use phyohtetaung\phpmvc\Controller;
use phyohtetaung\phpmvc\middlewares\AuthMiddleware;
use phyohtetaung\phpmvc\Request;
use phyohtetaung\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                exit;
            }
        }
        $this->setLayout('auth');

        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering.');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', [
                'model' => $user,
            ]);
        }
        $this->setLayout('auth');

        return $this->render('register', [
            'model' => $user,
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
