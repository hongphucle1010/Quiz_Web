<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "quizweb_db";
    private $user_list = "user_list";
    private $quiz_list = "quiz_list";
    private $question_list = "question_list";
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

    public function fetch_all() {
        if ($this->result) {
            $row = mysqli_fetch_all($this->result);
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

    public function get_password($email){
        $sql = "SELECT password FROM $this->user_list WHERE email = '$email'";
        $this->query($sql);
        $row = $this->fetch();
        return $row['password'];
    }
    
    public function change_password($email, $new_password){
        $sql = "UPDATE $this->user_list SET password = '$new_password' WHERE email = '$email'";
        $this->query($sql);
    }

    public function get_quiz_list($teacher_id){
        $sql = "SELECT * FROM $this->quiz_list WHERE teacherid = '$teacher_id'";
        $this->query($sql);
        $list_quiz = $this -> fetch_all();
        return $list_quiz;
    }

    public function get_teacher_id_by_quiz_id($quiz_id){
        $sql = "SELECT teacherid FROM $this->quiz_list WHERE id = '$quiz_id'";
        $this->query($sql);
        $row = $this->fetch();
        return $row['teacherid'];
    }

    public function get_all_quiz_list(){
        $sql = "SELECT * FROM $this->quiz_list";
        $this->query($sql);
        $list_quiz = $this -> fetch_all();
        return $list_quiz;
    }

    public function get_quiz($quiz_id){
        $sql = "SELECT * FROM $this->quiz_list WHERE quizid = '$quiz_id'";
        $this->query($sql);
        $quiz = $this -> fetch_all();
        return $quiz;
    }

    public function get_question_list($quiz_id){
        $sql = "SELECT * FROM $this->question_list WHERE quizid = '$quiz_id'";
        $this->query($sql);
        $list_question = $this -> fetch_all();
        return $list_question;
    }

    public function get_answer($quiz_id)
    {
        $sql = "SELECT id, answer FROM $this->question_list WHERE quizid = '$quiz_id'";
        $this->query($sql);
        $list_answer = $this -> fetch_all();
        return $list_answer;
    }

    public function create_question($quiz_id, $question, $op, $ans)
    {
        $sql = "INSERT INTO $this->question_list (question, opa, opb, opc, opd, answer, quizid) VALUES ('$question', '$op[0]', '$op[1]', '$op[2]', '$op[3]', '$ans', '$quiz_id')";
        $this->query($sql);
    }

    public function delete_question($question_id){
        $sql = "DELETE FROM $this->question_list WHERE id = '$question_id'";
        $this->query($sql);
    }

    public function create_quiz_list($quiz_name, $teacher_id)
    {
        $sql = "INSERT INTO $this->quiz_list (quizname, teacherid) VALUES ('$quiz_name', '$teacher_id')";
        $this->query($sql);
    }

    public function getUsername($user_id){
        $sql = "SELECT fullname FROM $this->user_list WHERE id = '$user_id'";
        $this->query($sql);
        $row = $this->fetch();
        return $row['fullname'];
    }

    public function get_quiz_name($quiz_id){
        $sql = "SELECT quizname FROM $this->quiz_list WHERE id = '$quiz_id'";
        $this->query($sql);
        $row = $this->fetch();
        return $row['quizname'];
    }

    public function check_match_teacher_quiz($teacher_id, $quiz_id){
        $sql = "SELECT * FROM $this->quiz_list WHERE teacherid = '$teacher_id' AND id = '$quiz_id'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}