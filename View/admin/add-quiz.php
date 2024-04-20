<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
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
            <p class="h4">Add a quiz</p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="add-quiz">
                <div class="row mb-2">
                    <div class="col-8">
                        <input type="text" class="form-control" name="quiz-name" placeholder="Quiz name" required>
                    </div>
                    <div class="col-4">
                        <select class="form-select" name="teacher-id" required>
                            <option value="" selected disabled>Select teacher</option>
                            <?php
                            $database->query("SELECT * FROM user_list WHERE role = 'teacher'");
                            $number_of_teachers = $database->num_rows();
                            if ($number_of_teachers == 0) {
                                echo "<option value='' disabled>No teacher found!</option>";
                            } else {
                                $teacher_list = $database->fetch();
                                for ($i = 0; $i < $number_of_teachers; $i++) {
                                    echo "<option value='" . $teacher_list['id'] . "'>" . $teacher_list['fullname'] . "</option>";
                                    $teacher_list = $database->fetch();
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Quiz</button>
            </form>
        </div>
        <?php
        require 'View/admin/quiz-list.php'
        ?>
    </main>
</body>

</html>