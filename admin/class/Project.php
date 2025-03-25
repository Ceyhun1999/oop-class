<?php
require_once 'C:\wamp64\www\lesson\oopwebsite\config/Database.php';

class Project
{

    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function insert($title, $description, $image)
    {
        $sql = "INSERT INTO projects (title, description, image)
                            VALUES ('$title', '$description', '$image')";

        $result = $this->db->conn->query($sql);
        return $result;
    }

    public function list()
    {
        $sql = "SELECT * FROM projects";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE  FROM projects WHERE id='$id'";
        if ($this->db->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM projects WHERE id='$id'";
        $result = $this->db->conn->query($sql);
        return $result;
    }


    public function update($id, $title, $description, $image)
    {
        $sql = "UPDATE projects SET title='$title', description='$description', image='$image' WHERE id='$id'";
        if ($this->db->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
