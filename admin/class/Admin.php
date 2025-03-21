<?php
require_once 'C:\wamp64\www\lesson\oopwebsite\config/Database.php';
class Admin
{
    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function list()
    {
        $sql = 'SELECT * FROM admins';
        $result = $this->db->conn->query($sql);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM admins WHERE id=$id";
        if ($this->db->conn->query($sql) === TRUE) {
            return "Пользователь удален";
        } else {
            return "Error deleting record: " . $this->db->conn->error;
        }
    }

    public function add($email, $password)
    {
        $sql = "INSERT INTO admins (email, password)
                        VALUES ('$email', '$password')";

        if ($this->db->conn->query($sql) === TRUE) {
            return 'Пользователь успешно создан';
        } else {
            return "Произошла ошибка";
        }
    }


    public function getByEmail($email)
    {
        $sql = "SELECT * FROM admins WHERE email='$email'";
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUser($email)
    {
        $sql = "SELECT * FROM admins WHERE email='$email'";
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUser2($email, $id)
    {
        $sql = "SELECT * FROM admins WHERE email='$email' and id!='$id'";
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id)
    {
        $escapedId = mysqli_real_escape_string($this->db->conn, $id);
        $sql = "SELECT * FROM admins WHERE id='$escapedId'";
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user['email'];
        } else {
            return false;
        }
    }

    public function update($email, $password, $id)
    {
        $sql = "UPDATE admins SET email='$email', password='$password' WHERE id='$id'";
        if ($this->db->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email)
    {
        $sql = "SELECT * FROM admins WHERE email='$email'";
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return $result;
        }
    }
}
