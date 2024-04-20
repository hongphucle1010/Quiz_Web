<?php
require_once 'View/general/navbar.php';
if (isset($_POST['action'])) {
    $action = $_POST['action']; 
} else {
    $action = '';
}

switch($action) {
    case 'start-quiz':
        require_once 'View/student/doing-quiz.php';
        break;
    case 'submit-quiz':
        $answers = $database -> get_answer($_GET['quiz_id']);
        $score = 0;
        $number_of_questions = count($answers);
        foreach ($answers as $answer) {
            if ($_POST['question-' . $answer[0]] == $answer[1]) {
                $score++;
            }
        }
        echo '<p class="h1">Your score: ' . $score . '/' . $number_of_questions . '</p>';
        break;
    default:
        require_once 'View/student/quiz.php';
        break;
}

