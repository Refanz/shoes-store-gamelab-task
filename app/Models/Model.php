<?php

namespace App\Models;

use Medoo\Medoo;
use Psr\Container\ContainerInterface;

abstract class Model
{

    /**
     * @var Medoo $db
     */
    protected $db;

    protected $table;

    public function __construct(ContainerInterface $container)
    {
        $this->db = $container->get('db');
    }

    public function getAll()
    {
        return $this->db->select($this->table, '*');
    }

    public function getById($id)
    {
        return $this->db->select($this->table, '*', [
            "id" => $id
        ]);
    }

    public function insert(array $data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->id();
    }

    public function update($id, array $data)
    {
        $update = $this->db->update($this->table, $data, [
            "id" => $id
        ]);

        return ($update !== NULL) && $update->rowCount() > 0;
    }

    public function delete($id)
    {
        $delete = $this->db->delete($this->table, [
            "id" => $id
        ]);

        return ($delete !== NULL) && $delete->rowCount() > 0;
    }
}