<?php

namespace App\Controllers;

use App\Models\Shoes;
use Psr\Container\ContainerInterface;
use Slim\Flash\Messages;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class ShoesController
{

    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * @var Shoes $shoes
     */
    private $shoes;

    /**
     * @var Messages $flash
     */
    private $flash;

    /**
     * @var Twig $view
     */
    private $view;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->flash = $this->container->get('flash');
        $this->view = $this->container->get('view');
        $this->shoes = new Shoes($this->container);
    }

    public function index(Request $request, Response $response, array $args)
    {
        $status = $this->flash->getMessage("status");
        $statusEdit = $this->flash->getMessage("status_edit");
        $statusDelete = $this->flash->getMessage("status_delete");

        $listShoes = $this->shoes->getAll();

        return $this->view->render($response, 'admin/product-shoes/list-shoes.html', [
            'listShoes' => $listShoes,
            'status' => $status,
            'status_edit' => $statusEdit,
            'status_delete' => $statusDelete
        ]);
    }

    public function insert(Request $request, Response $response, array $args)
    {

        $directory = $this->container->get('upload_directory');

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $uploadedFiles = $request->getUploadedFiles();
        $uploadedShoesImg = $uploadedFiles["foto-sepatu"];

        if ($uploadedShoesImg->getError() === UPLOAD_ERR_OK) {
            $filename = $uploadedShoesImg->getClientFilename();
            $uploadedShoesImg->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

            $nama = $request->getParam("nama-sepatu");
            $harga = $request->getParam("harga-sepatu");
            $tipeSepatu = $request->getParam("tipe-sepatu");
            $status = $request->getParam('status');
            $img = "/assets/uploads/" . $filename;

            $this->shoes->insert([
                "nama" => $nama,
                "harga" => $harga,
                "img" => $img,
                "status" => $status,
                "type" => $tipeSepatu
            ]);

            $this->flash->addMessage("status", true);

            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function edit(Request $request, Response $response, array $args)
    {
        $id = $args["id"];

        $editShoes = $this->shoes->getById($id)[0];

        return $this->view->render($response, 'admin/product-shoes/edit-shoes.html', $editShoes);
    }

    public function update(Request $request, Response $response, array $args)
    {
        $shoesId = $request->getParam("id");
        $nama = $request->getParam("nama-sepatu");
        $harga = $request->getParam("harga-sepatu");
        $tipeSepatu = $request->getParam("tipe-sepatu");
        $status = $request->getParam('status');
        $img = "/assets/uploads/";

        $data = [
            "nama" => $nama,
            "harga" => $harga,
            "type" => $tipeSepatu,
            "status" => $status,
            "img" => $img
        ];

        $update = $this->shoes->update($shoesId, $data);

        if ($update) {
            $this->flash->addMessage("status_edit", true);
            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        $this->flash->addMessage("status_edit", false);
        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function delete(Request $request, Response $response, array $args)
    {

        $id = $args["id"];

        $delete = $this->shoes->delete($id);

        if ($delete) {
            $this->flash->addMessage("status_delete", true);
            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        $this->flash->addMessage("status_delete", false);
        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function get(Request $request, Response $response, array $args)
    {
        $id = $args["id"];

        $getShoes = $this->shoes->getById($id);

        if (count($getShoes) > 0) {
            return $response->withJson([
                "data" => $getShoes
            ])->withStatus(200);
        }

        return $response->withJson([
            "message" => "Data sepatu kosong!"
        ])->withStatus(404);
    }
}