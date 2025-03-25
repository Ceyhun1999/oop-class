<?php
require_once 'C:\wamp64\www\lesson\oopwebsite\config/Database.php';

class Blog
{

    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert($title, $description, $image)
    {

        $sql = "INSERT INTO news (title, description, image)
                            VALUES ('$title', '$description', '$image')";
        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }


    public function list()
    {
        $sql = "SELECT * FROM news";
        $result = $this->db->conn->query($sql);
        return $result;
    }


    public function delete($id)
    {
        $sql = "DELETE from news WHERE id='$id'";
        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }


    public function getById($id)
    {
        $sql = "SELECT * FROM news WHERE id='$id'";
        $result = $this->db->conn->query($sql);
        return $result;
    }


    public function update($id, $title, $description, $image)
    {
        $sql = "UPDATE news SET title='$title', description='$description', image='$image' WHERE id='$id'";
        if ($this->db->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
