<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
</head>

<body>
    <main style="
        display: flex;
        flex-direction: column;
        padding: 25px;
    ">
        <div style="
            padding: 20px;
            margin-bottom: 20px;
            background-color: rgba(240, 248, 255, 1);
            border-radius: 15px;
        ">
            <p class="h4">Edit a quiz</p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="edit-quiz">
                <select class="form-select mb-2" name="quiz-id" required>
                    <option value="" selected disabled>Select quiz</option>
                    <?php
                    $database->query("SELECT * FROM quiz_list");
                    $number_of_quizzes = $database->num_rows();
                    if ($number_of_quizzes == 0) {
                        echo "<option value='' disabled>No quiz found!</option>";
                    } else {
                        $quiz_list = $database->fetch_all();
                        foreach ($quiz_list as $quiz) {
                            echo "<option value='" . $quiz[0] . "'>" . $quiz[1] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="text" class="form-control mb-2" name="new-quiz-name" placeholder="New quiz name" required>
                <select class="form-select mb-2" name="teacher-id" required>
                    <option value="" selected disabled>Select teacher</option>
                    <?php
                    $database->query("SELECT * FROM user_list WHERE role = 'teacher'");
                    $number_of_teachers = $database->num_rows();
                    if ($number_of_teachers == 0) {
                        echo "<option value='' disabled>No teacher found!</option>";
                    } else {
                        $teacher_list = $database->fetch_all();
                        foreach ($teacher_list as $teacher) {
                            echo "<option value='" . $teacher[0] . "'>" . $teacher[3] . "</option>";
                        }
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary">Edit Quiz</button>
            </form>
        </div>
        
        <?php
        require 'View/admin/quiz-list.php'
        ?>
    </main>

</body>

</html>