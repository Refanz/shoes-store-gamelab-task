<?php

namespace App\Controllers;

use App\Models\Auth;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthController extends BaseController
{

    protected $auth;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->auth = new Auth($this->container);
    }

    public function formLogin(Request $request, Response $response, array $args): Response
    {
        $statusLogin = $this->getFlashMessage("status_login");
        $statusRegister = $this->getFlashMessage("status_register");

        return $this->render($response, "login.html", [
            "status_login_error" => $statusLogin,
            "status_register" => $statusRegister
        ]);
    }

    public function formRegister(Request $request, Response $response, array $args): Response
    {
        $statusRegister = $this->getFlashMessage("status_register");

        return $this->render($response, "register.html", [
            "status_register" => $statusRegister
        ]);
    }

    public function register(Request $request, Response $response, array $args): Response
    {
        $name = $request->getParam("name");
        $email = $request->getParam("email");
        $password = $request->getParam("password");

        $data = [
            "nama" => $name,
            "email" => $email,
            "password" => $password,
            "role" => "user"
        ];

        $isEmailExists = $this->auth->isEmailExists($email);

        if ($isEmailExists) {
            $this->flashMessage('status_register', 1);
            return $response->withRedirect("/register");
        }

        $this->auth->insert($data);
        $this->flashMessage("status_register", 2);
        return $response->withRedirect("/login");
    }

    public function login(Request $request, Response $response, array $args): Response
    {
        $email = $request->getParam("email");
        $password = $request->getParam("password");

        $userLogin = $this->auth->checkUser([
            "email" => $email,
            "password" => $password
        ]);

        if ($userLogin) {
            $_SESSION['auth'] = [
                "id" => $userLogin["id"],
                "name" => $userLogin["nama"],
                "email" => $userLogin["email"],
                "role" => $userLogin["role"]
            ];

            return $response->withRedirect("/admin");
        }

        $this->flashMessage('status_login', false);
        return $response->withRedirect("/login");
    }

    public function logout(Request $request, Response $response, array $args): Response
    {
        session_unset();
        unset($_SESSION["auth"]);
        session_destroy();
        $_SESSION["auth"] = NULL;

        return $response->withRedirect("/login");
    }

}