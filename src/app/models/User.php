<?php 
class User 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register(array $data) 
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        return $this->db->execute() ? true : false;
    }

    public function login($email, $password) 
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function exists($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :value');
        $this->db->bind(':value', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        }
        return false;
    }
}