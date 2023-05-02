<?php

namespace craine\standart;

use PDO, PDOException;

trait crud
{
    protected $db;
    public static $dbHOST = "localhost", $dbUSER = "root", $dbPASS = "root", $dbNAME = "craine";
    public static $base = "http://localhost/dvlt39/craine/", $acceptPage = ["auth", "process", "error"];
    public $page, $type;

    public function const()
    {
        $this->dbConnect();
        $this->pageDetect();
    }

    private function pageDetect()
    {
        $this->page = $_GET["page"] ?? "upload";
        $this->type = $_GET["type"] ?? null;
    }

    public function dbConnect()
    {
        try {
            $this->db = new PDO("mysql:host=" . $this::$dbHOST . ";dbname=" . $this::$dbNAME . ";charset=utf8", $this::$dbUSER, $this::$dbPASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    protected function addValue($val, $imp)
    {
        $values = implode($imp, array_map(function ($v) {
            return $v . '=?';
        }, array_keys($val)));
        return $values;
    }

    public function read($table, $values, $afterValue)
    {
        try {
            if (!empty($values)) {
                $sql = $this->db->prepare("SELECT * FROM $table WHERE {$this->addValue($values, ' and ')} $afterValue");
            } else {
                $sql = $this->db->prepare("SELECT * FROM $table");
            }
            $sql->execute(array_values($values));
            return $sql;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create($table, $values, $type)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO $table SET {$this->addValue($values, ',')}");
            $sql->execute(array_values($values));
            if ($type == 'db') {
                return $this->db;
            } else {
                return $sql;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($table, $values, $id)
    {
        try {
            $sql = $this->db->prepare("UPDATE $table SET {$this->addValue($values, ',')} WHERE {$table}ID = $id");
            $sql->execute(array_values($values));
            return $sql;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($table, $id)
    {
        try {
            $sql = $this->db->prepare("DELETE FROM $table WHERE {$table}ID = $id");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function dayTime()
    {
        $h = date("H");

        if ($h >= 6 && $h < 12) {
            return "Günaydın!";
        } else if ($h >= 12 && $h < 18) {
            return "İyi günler!";
        } else if ($h >= 18 && $h < 24) {
            return "İyi akşamlar!";
        } else {
            return "İyi geceler!";
        }
    }

    public function pwdEncode(&$pwd): void
    {
        $pwd = md5($pwd . "HASH");
    }
}
