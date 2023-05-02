<?php

namespace craine\standart;

use PDO;

class user
{
    use crud;

    public function get($col)
    {
        $session = $_SESSION["user"] ?? null;


        $query = $this->read("users", ["usersStatus" => 1, "email" => $session["mail"], "password" => $session["pwd"]], "");
        return $query->fetch(PDO::FETCH_ASSOC)[$col];
    }

    private function isUser()
    {
        if (empty($this->get("email")) && !in_array($this->page, $this::$acceptPage)) {
            header('Location: ' . $this::$base . "auth/signin");
        }
    }

    public function __construct()
    {
        $this->const();
        $this->isUser();
    }
}
