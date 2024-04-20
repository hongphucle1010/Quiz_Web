<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a teacher</title>
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
            <p class="h4">Add a teacher</p>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="add-teacher">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
                <button type="submit" class="btn btn-primary mt-2">Add Teacher</button>
            </form>
        </div>
        <?php
        require 'View/admin/user-list.php';
        ?>
    </main>
</body>

</html>