<?php

namespace App\Controllers;

use App\Models\Shoes;
use App\Utils\Utils;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ShoesController extends BaseController
{

    protected $shoes;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->shoes = new Shoes($this->container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $status = $this->getFlashMessage("status");
        $statusEdit = $this->getFlashMessage("status_edit");
        $statusDelete = $this->getFlashMessage("status_delete");

        $listShoes = $this->shoes->getAll();

        return $this->render($response, 'admin/product-shoes/list-shoes.html', [
            'listShoes' => $listShoes,
            'status' => $status,
            'status_edit' => $statusEdit,
            'status_delete' => $statusDelete,
            'active' => 'index-shoes'
        ]);
    }

    public function create(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'admin/product-shoes/add-shoes.html', [
            'active' => 'add-shoes'
        ]);
    }

    public function insert(Request $request, Response $response, array $args): Response
    {
        $directory = $this->container->get('upload_directory');

        if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $directory));
        }

        $uploadedFiles = $request->getUploadedFiles();
        $uploadedShoesImg = $uploadedFiles["foto-sepatu"];

        if ($uploadedShoesImg->getError() === UPLOAD_ERR_OK) {

            $filename_ext = explode("/", $uploadedShoesImg->getClientMediaType())[1];

            $filename = sprintf('%s.%s', Utils::getCurrentTime(), $filename_ext);

            $uploadedShoesImg->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

            $name = $request->getParam("nama-sepatu");
            $price = $request->getParam("harga-sepatu");
            $shoesType = $request->getParam("tipe-sepatu");
            $status = $request->getParam('status');
            $img = "/assets/uploads/" . $filename;

            $this->shoes->insert([
                "nama" => $name,
                "harga" => $price,
                "img" => $img,
                "status" => $status,
                "type" => $shoesType
            ]);

            $this->flashMessage("status", true);

            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function edit(Request $request, Response $response, array $args): Response
    {
        $id = $args["id"];

        $editShoes = $this->shoes->getById($id)[0];

        return $this->render($response, 'admin/product-shoes/edit-shoes.html', $editShoes);
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $directory = $this->container->get('upload_directory');

        $shoesId = $request->getParam("id");
        $name = $request->getParam("nama-sepatu");
        $price = $request->getParam("harga-sepatu");
        $shoesType = $request->getParam("tipe-sepatu");
        $status = $request->getParam('status');

        $imgShoesNow = $request->getParam("img-sepatu-now");
        $imgShoesUpdate = $request->getUploadedFiles();

        $imgShoesUpdateTemp = $imgShoesUpdate["foto-sepatu"];

        if (empty($imgShoesUpdateTemp->getClientFilename())) {
            $data = [
                "nama" => $name,
                "harga" => $price,
                "type" => $shoesType,
                "status" => $status,
                "img" => $imgShoesNow
            ];
        } else {
            $filename_ext = explode("/", $imgShoesUpdateTemp->getClientMediaType())[1];
            $filename = sprintf('%s.%s', Utils::getCurrentTime(), $filename_ext);

            $imgShoesUpdateTemp->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
            $imgUpdateName = "/assets/uploads/" . $filename;

            $imgShoesName = explode("/", $imgShoesNow);

            unlink($directory . DIRECTORY_SEPARATOR . $imgShoesName[array_key_last($imgShoesName)]);

            $data = [
                "nama" => $name,
                "harga" => $price,
                "type" => $shoesType,
                "status" => $status,
                "img" => $imgUpdateName
            ];
        }

        $update = $this->shoes->update($shoesId, $data);

        if ($update) {
            $this->flashMessage("status_edit", true);
            return $response->withRedirect('/admin/product-shoes/list-shoes');
        }

        $this->flashMessage("status_edit", false);
        return $response->withRedirect('/admin/product-shoes/list-shoes');
    }

    public function delete(Request $request, Response $response, array $args): Response
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
}