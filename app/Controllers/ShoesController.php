<?php

namespace App\Controllers;

use App\Models\Shoes;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ShoesController extends BaseController
{

    protected $shoes;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->shoes = new Shoes($this->container);
    }

    public function index(Request $request, Response $response, array $args)
    {
        $status = $this->getFlashMessage("status");
        $statusEdit = $this->getFlashMessage("status_edit");
        $statusDelete = $this->getFlashMessage("status_delete");

        $listShoes = $this->shoes->getAll();

        return $this->render($response, 'admin/product-shoes/list-shoes.html', [
            'listShoes' => $listShoes,
            'status' => $status,
            'status_edit' => $statusEdit,
            'status_delete' => $statusDelete
        ]);
    }


    public function create(Request $request, Response $response, array $args)
    {
        return $this->render($response, 'admin/product-shoes/add-shoes.html', $args);
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

            $this->flashMessage("status", true);

            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function edit(Request $request, Response $response, array $args)
    {
        $id = $args["id"];

        $editShoes = $this->shoes->getById($id)[0];

        return $this->render($response, 'admin/product-shoes/edit-shoes.html', $editShoes);
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
            $this->flashMessage("status_edit", true);
            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        $this->flashMessage("status_edit", false);
        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function delete(Request $request, Response $response, array $args)
    {

        $id = $args["id"];

        $delete = $this->shoes->delete($id);

        if ($delete) {
            $this->flashMessage("status_delete", true);
            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        $this->flashMessage("status_delete", false);
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