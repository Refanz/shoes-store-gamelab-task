<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Shoes;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ShopController extends BaseController
{

    protected $shoes;
    protected $cart;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->shoes = new Shoes($this->container);
        $this->cart = new Cart($this->container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $listShoes = $this->shoes->getAll();
        return $this->render($response, 'user/shop.html', [
            "active" => "shop",
            "listShoes" => $listShoes
        ]);
    }

    public function cart(Request $request, Response $response, array $args): Response
    {
        $cartInsertStatus = $this->getFlashMessage("cart_insert");
        $idUser = $_SESSION["auth"]["id"];
        $listCart = $this->cart->getCartByIdUser($idUser);
        $totalPrice = $this->cart->getTotalPrice($idUser);
        $cartQuantityUpdateStatus = $this->getFlashMessage("cart_quantity_edit");

        return $this->render($response, 'user/cart.html', [
            "cart_insert" => $cartInsertStatus,
            "active" => "shop",
            "listCart" => $listCart,
            "totalPrice" => $totalPrice["totalPrice"],
            "cart_quantity_edit" => $cartQuantityUpdateStatus
        ]);
    }

    public function addToCart(Request $request, Response $response, array $args): Response
    {
        $idShoes = $request->getParam("id_shoes");
        $idUser = $_SESSION["auth"]["id"];

        $cart = $this->cart->insert([
            "product_id" => $idShoes,
            "user_id" => $idUser
        ]);


        if (!empty($cart)) {
            $this->flashMessage('cart_insert', true);
            return $response->withRedirect('/shop/cart');
        }

        $this->flashMessage('cart_insert', false);
        return $response->withRedirect('/shop');
    }

    public function updateQuantity(Request $request, Response $response, array $args)
    {
        $cartId = $request->getParam("cart_id");
        $quantity = $request->getParam("quantity");

        $count = count($cartId);

        $update = false;

        for ($i = 0; $i < $count; $i++) {
            $this->cart->update($cartId[$i], [
                "quantity" => $quantity[$i]
            ]);

        }

        if ($update) {
            $this->flashMessage("cart_quantity_edit", true);
            return $response->withRedirect('/shop/cart');
        }

        $this->flashMessage("cart_quantity_edit", false);
        return $response->withRedirect('/shop/cart');
    }
}
