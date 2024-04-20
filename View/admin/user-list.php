<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <p class="h3">Here are all users exist in database</p>
    <section id="all-quiz-list">
        <div class="container">
            <table class="table table-responsive-lg">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Fullname</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $database->query("SELECT * FROM user_list");
                    $users = $database->fetch_all();
                    $i = 1;
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $user[1] . "</td>";
                        echo "<td>" . $user[2] . "</td>";
                        echo "<td>" . $user[3] . "</td>";
                        echo "<td>" . $user[4] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>