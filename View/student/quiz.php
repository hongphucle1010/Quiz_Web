<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz</title>
    <style>

    </style>
</head>

<body>
    <main style="
        padding: 20px;
    ">
        <div id="quiz-name">
            <?php
            $quiz_name = $database->get_quiz_name($_GET['quiz_id']);
            $teacher_id = $database->get_teacher_id_by_quiz_id($_GET['quiz_id']);
            $teacher_name = $database->getUsername($teacher_id);
            echo '<p class="h1">' . $quiz_name . ' - '. $teacher_name. '</p>';
            ?>
        </div>

        <form action="quiz.php?quiz_id=<?php echo $_GET['quiz_id'];?>" method="post">
            <input type="hidden" name="action" value="start-quiz">
            <input type="hidden" name="quiz_id" value="<?php echo $_GET['quiz_id']; ?>">
            <button class="my-button">Bắt đầu làm bài <i class="fa-solid fa-play"></i></button>
        </form>
    </main>
</body>

</html>