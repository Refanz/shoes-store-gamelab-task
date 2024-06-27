<?php

namespace App\Models;

class Shoes extends Model
{
    protected $table = 'shoes';

    public function getShoesWithLimit($limit): ?array
    {
        return $this->db->select($this->table, ["nama", "img", "harga"], [
            'LIMIT' => $limit
        ]);
    }

    public function getShoesByStatusAndLimit($status, $limit): ?array
    {
        return $this->db->select($this->table, ["nama", "img", "harga", "status"], [
            'status' => $status,
            'LIMIT' => $limit
        ]);
    }

    public function getShoesByStatusTypeLimit($status, $type, $limit): ?array
    {
        return $this->db->select($this->table, ["nama", "img", "harga", "status"], [
            'status' => $status,
            'type' => $type,
            'LIMIT' => $limit
        ]);
    }
}