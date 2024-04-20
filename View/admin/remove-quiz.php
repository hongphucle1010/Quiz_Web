<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Quiz</title>
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
            <p class="h4">Remove a quiz</p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="remove-quiz">
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
                <button type="submit" class="btn btn-primary">Remove Quiz</button>
            </form>
        </div>
        <?php
        require 'View/admin/quiz-list.php'
        ?>
    </main>
</body>

</html>