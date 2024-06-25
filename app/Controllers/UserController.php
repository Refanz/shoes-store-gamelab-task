<?php

namespace App\Controllers;

use App\Models\User;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends BaseController
{

    protected $user;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->user = new User($this->container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $listUser = $this->user->getAll();

        $userInsertStatus = $this->getFlashMessage('user_insert');
        $userDeleteStatus = $this->getFlashMessage('user_delete');
        $userUpdateStatus = $this->getFlashMessage('user_update');

        return $this->render($response, 'admin/user/list-user.html', [
            'user_insert' => $userInsertStatus,
            'user_delete' => $userDeleteStatus,
            'user_update' => $userUpdateStatus,
            'listUser' => $listUser,
            'active' => "index-user"
        ]);
    }

    public function create(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'admin/user/add-user.html', [
            'active' => "add-user"
        ]);
    }

    public function insert(Request $request, Response $response, array $args): Response
    {
        $name = $request->getParam('nama-user');
        $email = $request->getParam('email');
        $password = $request->getParam('password');
        $role = $request->getParam('role');

        $data = [
            "nama" => $name,
            "email" => $email,
            "password" => $password,
            "role" => $role
        ];

        $idInsert = $this->user->insert($data);

        if (!empty($idInsert)) {
            $this->flashMessage('user_insert', true);
            return $response->withRedirect('/admin/users/list-user');
        }

        $this->flashMessage('user_insert', false);
        return $response->withRedirect('/admin/users/list-user');
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];

        $user = $this->user->getById($id)[0];

        return $this->render($response, 'admin/user/edit-user.html', $user);
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $id = $args["id"];
        $name = $request->getParam("nama-user");
        $email = $request->getParam("email");
        $password = $request->getParam("password");
        $role = $request->getParam("role");

        $data = [
            "nama" => $name,
            "email" => $email,
            "password" => $password,
            "role" => $role
        ];

        $update = $this->user->update($id, $data);

        if ($update) {
            $this->flashMessage("user_update", true);
            return $response->withRedirect('/admin/users/list-user');
        }


        $this->flashMessage("user_update", false);
        return $response->withRedirect('/admin/users/list-user');
    }


    public function delete(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];

        $delete = $this->user->delete($id);

        if ($delete) {
            $this->flashMessage('user_delete', true);
            return $response->withRedirect('/admin/users/list-user');
        }

        $this->flashMessage('user_delete', false);
        return $response->withRedirect('/admin/users/list-user');
    }
}
