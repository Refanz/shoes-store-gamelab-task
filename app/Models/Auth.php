<?php

namespace App\Models;

class Auth extends Model
{
    protected $table = "users";

    public function checkUser($credentials)
    {
        return $this->db->get($this->table, ["id", "nama", "email", "password", "role"], [
            "AND" => [
                "email" => $credentials["email"],
                "password" => $credentials["password"]
            ]
        ]);
    }

    public function isEmailExists($email): bool
    {
        $userEmail = $this->db->get($this->table, ["email"], [
            "email" => $email
        ]);

        return $userEmail > 0;
    }
}