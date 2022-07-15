<?php
require_once(__DIR__ . '\Database.php');

class Manga extends Database
{
    private $sql, $conn, $stmt;

    public function __construct()
    {
        $this->conn = parent::conn();
    }

    public function create($data)
    {
        try {
            $this->setSql("INSERT INTO " .DB_TABLE. " (id_category, name, author, price) VALUES (' " . $data['category'] . " ', ' " . $data['name'] . " ', ' " . $data['author'] . " ', ' " . $data['price'] . " ')");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function read()
    {
        try {
            $this->setSql("SELECT mangas.*, mangas_category.name as categoria FROM " .DB_TABLE. " INNER JOIN mangas_category ON mangas.id_category = mangas_category.id_category WHERE mangas.status = 1");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            return $this->stmt->fetchAll();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function readById(int $id) 
    {
        try {
            $this->setSql("SELECT * FROM " .DB_TABLE. " WHERE id_mangas = {$id}");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            return $this->stmt->fetch();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($data)
    {
        try {
            $this->setSql(
            "UPDATE " . DB_TABLE . "
                SET name = '{$data['name']}'
            WHERE
                id_mangas = {$data['id_mangas']}
            ");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function delete(int $id)
    {
        try {
            $this->setSql("DELETE FROM " . DB_TABLE . " WHERE id_mangas = $id");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    public function getSql() 
    {
        return $this->sql;
    }
}
