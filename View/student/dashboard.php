<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #quiz-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: rgba(240, 248, 255, 1);
            width: 90vw;
            padding: 20px;
            border-radius: 15px;
        }
        #quiz-list .quiz-items {
            margin: 10px 0;
        }
        #quiz-list .quiz-items button{
            margin: 10px;
            background-color: white;
            padding: 20px;
            width: 40vw;
            height: 4rem;
            border-radius: 10px;
            text-decoration: none;
        }
        #quiz-list .quiz-items button:hover{
            background-color: rgba(240, 248, 255, 0.5);
        }
    </style>
    <title>Student's dashboard</title>
</head>

<body>
    <main style="
        padding: 25px 25px;
    ">
        <p class="h3" style="margin-bottom: 20px;">Quiz hiện tại</p>
        <section id="quiz-list">
            <?php
            $quiz_list = $database->get_all_quiz_list();
            if ($quiz_list) {
                foreach ($quiz_list as $quiz) {
                    echo 
                        '<form action="quiz.php" method="get" class="quiz-items">
                            <input type="hidden" name="quiz_id" value="' . $quiz[0] . '">
                            <button type="submit" class="btn btn-link p-0 m-0">' . $quiz[1] . '</button>
                        </form>';
                }
            } else {
                echo '<p class="m-0">Chưa có bài quiz nào</p>';
            }
            ?>
        </section>
    </main>
</body>

</html>