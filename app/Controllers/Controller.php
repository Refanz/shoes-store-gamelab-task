<?php

namespace App\Controllers;

use App\Models\Review;
use App\Models\Shoes;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Controller extends BaseController
{

    protected $review;
    protected $shoes;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->review = new Review($this->container);
        $this->shoes = new Shoes($this->container);
    }

    public function user(Request $request, Response $response, array $args): Response
    {
        $listReview = $this->review->getAll();
        $listShoes = $this->shoes->getShoesWithLimit(3);
        $listNewShoes = $this->shoes->getShoesByStatusAndLimit("new", 4);
        $listTrendingSneakers = $this->shoes->getShoesByStatusTypeLimit("trending", "sneakers", 4);
        $listTrendingActive = $this->shoes->getShoesByStatusTypeLimit("trending", "active", 4);
        $listTrendingSandals = $this->shoes->getShoesByStatusTypeLimit("trending", "sandals", 4);
        $listPopularShoes = $this->shoes->getShoesByStatusAndLimit("popular", 3);

        if (isset($_SESSION["auth"])) {
            $this->view->getEnvironment()->addGlobal('auth', $_SESSION["auth"]);
        }

        return $this->render($response, 'user/index.html', [
            "active" => "home",
            "listReview" => $listReview,
            "listShoes" => $listShoes,
            "listNewShoes" => $listNewShoes,
            "listTrendingSneakers" => $listTrendingSneakers,
            "listTrendingActive" => $listTrendingActive,
            "listTrendingSandals" => $listTrendingSandals,
            "listPopularShoes" => $listPopularShoes
        ]);
    }

    public function admin(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'admin/index.html', [
            "active" => "index-admin"
        ]);
    }
}