<?php
require_once 'View/general/navbar.php';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = '';
}

switch($action) {
    case 'add_question':
        $quiz_id = $_POST['quiz_id'];
        $question_content = $_POST['question_content'];
        $answer_a = $_POST['answer_a'];
        $answer_b = $_POST['answer_b'];
        $answer_c = $_POST['answer_c'];
        $answer_d = $_POST['answer_d'];
        $correct_answer = $_POST['correct_answer'];
        $database->create_question($quiz_id, $question_content, [$answer_a, $answer_b, $answer_c, $answer_d], $correct_answer);
        break;
    case 'delete_question':
        $question_id = $_POST['question_id'];
        $database->delete_question($question_id);
        break;
    default:
        break;
}

require_once 'View/teacher/quiz.php';
