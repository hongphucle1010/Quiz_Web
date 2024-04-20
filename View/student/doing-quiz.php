<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doing Quiz</title>
</head>

<body>
    <main style="
        padding: 20px;
    ">
        <?php
        $quiz_name = $database->get_quiz_name($_GET['quiz_id']);
        $teacher_id = $database->get_teacher_id_by_quiz_id($_GET['quiz_id']);
        $teacher_name = $database->getUsername($teacher_id);
        echo '<p class="h1 mb-2">' . $quiz_name . ' - ' . $teacher_name . '</p>';

        $questions = $database->get_question_list($_GET['quiz_id']);
        $question_number = 1;
        echo '<form action="quiz.php?quiz_id=' . $_GET['quiz_id'] . '" method="post">';
        foreach ($questions as $question) {
            echo '<div class="mb-2">';
            echo '<p class="h3">' . $question_number . '. ' . $question[1] . '</p>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" name="question-' . $question[0] . '" id="question-' . $question[0] . '-a" value="A">';
            echo '<label class="form-check-label" for="question-' . $question[0] . '-a">' . $question[2] . '</label>';
            echo '</div>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" name="question-' . $question[0] . '" id="question-' . $question[0] . '-b" value="B">';
            echo '<label class="form-check-label" for="question-' . $question[0] . '-b">' . $question[3] . '</label>';
            echo '</div>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" name="question-' . $question[0] . '" id="question-' . $question[0] . '-c" value="C">';
            echo '<label class="form-check-label" for="question-' . $question[0] . '-c">' . $question[4] . '</label>';
            echo '</div>';
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" name="question-' . $question[0] . '" id="question-' . $question[0] . '-d" value="D">';
            echo '<label class="form-check-label" for="question-' . $question[0] . '-d">' . $question[5] . '</label>';
            echo '</div>';
            echo '</div>';
            $question_number++;
        }
        echo '<input type="hidden" name="action" value="submit-quiz">';
        echo '<input type="submit" class="my-button" value="Submit Quiz">';
        echo '</form>';
        ?>
    </main>
</body>

</html>