<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quiz</title>
    <style>
        .my-button{
            border-radius: 50%;
            background-color: orange;            
            border: none;
        }
        .my-button:hover{
            background-color: yellow;
        }   
        
        .hide{
            display: none;
        }


        #add-question-area{
            padding: 20px;
            border-radius: 10px;
            background-color: pink;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <main style="
        padding: 20px;
    ">
        <div id="quiz-name">
            <?php
            $quiz_name = $database->get_quiz_name($_GET['quiz_id']);
            echo '<span class="h1">' . $quiz_name . '</span>';
            ?>
            <a href="quiz.php"><button class="my-button"><i class="fa-solid fa-rotate-left"></i></button></a>
        </div>
        <span class="h3">Các câu hỏi hiện tại </span>
        <button id="add-question" class="my-button"><i class="fa-solid fa-plus"></i></button>
        <div id="add-question-area" class="hide">
            <form action="quiz.php?quiz_id=<?php echo $quiz_id; ?>" method="post">
                <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
                <input type="hidden" name="action" value="add_question">
                <p class="h4">Nội dung câu hỏi</p>
                <textarea name="question_content" id="question_content" cols="20" rows="3" class="form-control"></textarea>
                <p class="h4 mt-2 mb-2">Câu trả lời</p>
                <div class="row mb-2">
                    <div class="col-6">
                        <input type="text" name="answer_a" id="answer_a" class="form-control" placeholder="Câu A">
                    </div>
                    <div class="col-6">
                        <input type="text" name="answer_b" id="answer_b" class="form-control" placeholder="Câu B">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="answer_c" id="answer_c" class="form-control" placeholder="Câu C">
                    </div>
                    <div class="col-6">
                        <input type="text" name="answer_d" id="answer_d" class="form-control" placeholder="Câu D">
                    </div>
                </div>
                <p class="h4 mt-2 mb-2">Câu trả lời đúng</p>
                <select name="correct_answer" id="correct_answer" class="form-control">
                    <option value="A">Câu A</option>
                    <option value="B">Câu B</option>
                    <option value="C">Câu C</option>
                    <option value="D">Câu D</option>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Thêm câu hỏi</button>
            </form>
        </div>
        <section id="question-list">
            <?php
            $question_list = $database->get_question_list($_GET['quiz_id']);
            if ($question_list) {
                echo '<table class="table table-bordered mt-4">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>STT</th>';
                echo '<th>Nội dung câu hỏi</th>';
                echo '<th>Câu A</th>';
                echo '<th>Câu B</th>';
                echo '<th>Câu C</th>';
                echo '<th>Câu D</th>';
                echo '<th>Câu trả lời đúng</th>';
                echo '<th style="text-align: center;">Thao tác</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                $i = 1;
                foreach ($question_list as $question) {
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $question[1] . '</td>';
                    echo '<td>' . $question[2] . '</td>';
                    echo '<td>' . $question[3] . '</td>';
                    echo '<td>' . $question[4] . '</td>';
                    echo '<td>' . $question[5] . '</td>';
                    echo '<td>' . $question[6] . '</td>';
                    echo '<td class="d-flex justify-content-center">
                        <form action="quiz.php?quiz_id=' . $_GET['quiz_id'] . '" method="post">
                            <input type="hidden" name="question_id" value="' . $question[0] . '">
                            <input type="hidden" name="action" value="delete_question">
                            <button type="submit" class="my-button"><i class="fa-solid fa-xmark"></i></button>   
                        </form>
                    </td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="m-0">Chưa có câu hỏi nào</p>';
            }
            ?>
    </main>
    <script>
        const addQuestionButton = document.getElementById('add-question');
        const addQuestionArea = document.getElementById('add-question-area');
        addQuestionButton.addEventListener('click', () => {
            addQuestionArea.classList.toggle('hide');
        });
    </script>

</body>
</html>