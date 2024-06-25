<?php

namespace App\Controllers;

use App\Models\Review;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ReviewController extends BaseController
{

    protected $review;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->review = new Review($this->container);
    }

    public function index(Request $request, Response $response, array $args)
    {
        $listReview = $this->review->getAll();

        return $this->render($response, 'admin/review-user/list-review.html', [
            'listReview' => $listReview,
            'active' => "index-review"
        ]);
    }

}
