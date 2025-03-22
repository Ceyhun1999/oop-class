<?php
require_once 'C:\wamp64\www\lesson\oopwebsite\config/Database.php';
class Slider
{

    public $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert($title, $image)
    {
        $sql = "INSERT INTO slider ( title, image)
                            VALUES ( '$title', '$image')";

        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $title, $image)
    {
        $sql = "UPDATE  slider SET title='$title', image='$image' WHERE id='$id'";

        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function list()
    {
        $sql = "SELECT * FROM slider";
        $result = $this->db->conn->query($sql);
        return $result;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM slider WHERE id='$id'";
        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM slider WHERE id='$id'";
        $result = $this->db->conn->query($sql);
        return $result;
    }


}
