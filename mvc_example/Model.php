<?php

class Model
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'mvc_example');

        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }

    public function getUsers($id = null)
    {
        $sql = 'SELECT id, name FROM users';

        if (!is_null($id)) {
            $sql .= ' WHERE id = ' . $id;
        }

        $result = $this->conn->query($sql);

        $users = [];

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }
}
