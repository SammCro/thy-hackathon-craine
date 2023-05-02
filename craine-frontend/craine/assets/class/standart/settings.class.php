<?php

namespace craine\standart;

use PDO;

class settings
{
    use crud;

    public function __construct()
    {
        $this->const();
    }

    public function get($col)
    {
        $query = $this->read("settings", ["settingsStatus" => 1], "");
        return $query->fetch(PDO::FETCH_ASSOC)["settings" . ucfirst($col)];
    }
}
