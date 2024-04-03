<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "quizweb_db";
    private $user_list = "user_list";
    private $conn = null;
    private $result = null;
    
    public function connect() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            echo "Kết nối thất bại!";
            exit();
        }
        mysqli_set_charset($this->conn, 'utf8');
        return $this->conn;
    }

    public function close() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
    
    public function query($sql) {
        $this->result = mysqli_query($this->conn, $sql);
        return $this->result;
    }

    public function num_rows() {
        if ($this->result) {
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }

    public function fetch() {
        if ($this->result) {
            $row = mysqli_fetch_array($this->result);
        } else {
            $row = 0;
        }
        return $row;
    }

    public function check_if_email_existed($email){
        $sql = "SELECT * FROM $this->user_list WHERE email = '$email'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_login($email, $password){
        $sql = "SELECT * FROM $this->user_list WHERE email = '$email' AND password = '$password'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function create_user($email, $password, $fullname){
        $sql = "INSERT INTO $this->user_list (email, password, fullname) VALUES ('$email', '$password', '$fullname')";
        $this->query($sql);
    }
}