<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <main style="
        display: flex;
        flex-direction: column;
        padding: 20px;
    ">
        <div style="
            padding: 20px;
            margin-bottom: 20px;
            background-color: rgba(240, 248, 255, 1);
            border-radius: 15px;
        ">
            <p class="h4">Edit a user</p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="edit-user">
                <select class="form-select mb-2" name="user-id" required>
                    <option value="" selected disabled>Select user</option>
                    <?php
                    $database->query("SELECT * FROM user_list");
                    $number_of_users = $database->num_rows();
                    if ($number_of_users == 0) {
                        echo "<option value='' disabled>No user found!</option>";
                    } else {
                        $user_list = $database->fetch();
                        for ($i = 0; $i < $number_of_users; $i++) {
                            echo "<option value='" . $user_list['id'] . "'>" . $user_list['email'] . "</option>";
                            $user_list = $database->fetch();
                        }
                    }
                    ?>
                </select>
                <label for="email" class="form-label">New email</label>
                <input type="email" class="form-control" id="email" name="email">
                <label for="password" class="form-label">New password</label>
                <input type="password" class="form-control" id="password" name="password">
                <label for="fullname" class="form-label">New fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
                <label for="role" class="form-label">New role</label>
                <select class="form-select mb-2" id="role" name="role">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" class="btn btn-primary">Edit User</button>
            </form>
        </div>
        <?php
        require 'View/admin/user-list.php';
        ?>
    </main>
</body>

</html>