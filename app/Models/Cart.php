<?php

namespace App\Models;

use Medoo\Medoo;

class Cart extends Model
{
    protected $table = "cart";

    public function getCartByIdUser($idUser): ?array
    {
        return $this->db->select($this->table, [
            '[><]users' => ['user_id' => 'id'],
            '[><]shoes' => ['product_id' => 'id']
        ], [
            'cart.id(cart_id)',
            'cart.user_id',
            'cart.product_id',
            'cart.quantity',
            'users.id(user_id)',
            'users.nama(user_name)',
            'users.email',
            'shoes.id(shoes_id)',
            'shoes.nama(shoes_name)',
            'shoes.harga)',
            'shoes.img(shoes_img)'
        ], [
            'user_id' => $idUser
        ]);
    }

    public function getTotalPrice($idUser)
    {
        return $this->db->get($this->table, [
            '[><]shoes' => ['product_id' => 'id']
        ], [
            'totalPrice' => Medoo::raw('SUM(<cart.quantity> * <shoes.harga>)')
        ], [
            'user_id' => $idUser
        ]);
    }
}
