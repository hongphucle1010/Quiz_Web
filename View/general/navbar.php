<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #navbar * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            color: black;
            box-sizing: border-box;
        }

        #navbar li:hover {
            background-color: pink;
            border-radius: 5px;
        }

        #navbar a {
            border: none;
            background-color: transparent;
            height: 100%;
            margin: 0 5px;
            padding: 5px 0;
        }


        #moveToTopButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        }

        #moveToTopButton:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top d-flex flex-row-reverse" style="
      padding: 0;
      font-size: 15px;
    ">
        <div class="container-fluid" style="
          margin: 0;
          background-color: rgba(218, 240, 247, 0.8);
          width: 100%;
          padding: 3px 20px;
      ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="padding: 0 10px;">
                <span class="navbar-toggler-icon" style="width: 18px;"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="font-size: 15px; font-weight: bold;" ;>Quiz Web</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navbar">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="setting.php" class="nav-link"><i class="fa-solid fa-gear"></i> Setting</a>
                    </li>

                </ul>
            </div>
            <div id="account-logout" class="d-flex align-items-center justify-content-center p-0">
                <div style="margin-right: 5px;"><?php echo $_SESSION['fullname'] ?></div>
                <form action="index.php" method="post">
                    <input type="hidden" name="controller" value="logout">
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <button id="moveToTopButton"><i class="fa-solid fa-arrow-up"></i></button>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let moveToTopButton = document.getElementById('moveToTopButton');

            window.addEventListener('scroll', function() {
                // Show or hide the "Move to Top" button based on the scroll position
                if (window.scrollY > 100) {
                    moveToTopButton.style.display = 'block';
                } else {
                    moveToTopButton.style.display = 'none';
                }
            });

            moveToTopButton.addEventListener('click', function() {
                // Smoothly scroll to the top of the page
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>

</html>