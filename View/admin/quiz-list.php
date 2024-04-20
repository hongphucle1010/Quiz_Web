<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <p class="h3">Here are all quizzes exist in database</p>
    <section id="all-quiz-list">
        <div class="container">
            <table class="table table-responsive-lg">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Quiz Name</th>
                        <th>Teacher</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $database->query("SELECT * FROM quiz_list");
                    $number_of_quizzes = $database->num_rows();
                    if ($number_of_quizzes == 0) {
                        echo "<tr><td colspan='3'>No quiz found!</td></tr>";
                    } else {
                        $i = 1;
                        $quiz_list = $database->fetch_all();
                        foreach ($quiz_list as $quiz) {
                            echo "<tr>";
                            echo "<td>" . ($i++) . "</td>";
                            echo "<td>" . $quiz[1] . "</td>";
                            echo "<td>" . $database->getUsername($quiz[2]) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>