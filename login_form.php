<?php
include_once 'classes/db1.php';
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Preranothsava</title>
    <style>
        span.error {
            color: red;
        }
        .form-control::placeholder {
            color: #ccc;
            font-style: italic;
        }
    </style>
    <?php require 'utils/styles.php'; ?>
    <!--css links. file found in utils folder-->
</head>

<body>
    <?php require 'utils/header3.php'; ?>
    <!--header content. file found in utils folder-->
    <div class="content">
        <!--body content holder-->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">

                <form method="POST">
                    <!--form-->

                    <!--username field-->
                    <label for="username">UserName:</label><br>
                    <input type="text" id="username" name="name" class="form-control" placeholder="Enter Username" required><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required><br>

                    <button type="submit" name="update" class="btn btn-default">Login</button>
                </form>
            </div><!-- col md 6 div -->
        </div><!-- container div -->
        <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div><!-- content div -->

    <?php require 'utils/footer.php'; ?>
    <!--footer content. file found in utils folder-->
</body>

</html>

<?php
if (isset($_POST["update"])) {
    // Sanitize user input
    $myusername = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $mypassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check credentials (in a real scenario, you would check against a hashed password stored in your database)
    $validUsername = 'PESITM';
    $validPassword = 'PESITM'; // This should be hashed in a real application

    if ($myusername === $validUsername && $mypassword === $validPassword) {
        $_SESSION['username'] = $myusername; // Store username in session for further use
        echo "<script>
            alert('Login Successful');
            window.location.href='adminPage.php';
            </script>";
    } else {
        echo "<script>
            alert('Invalid credentials');
            window.location.href='login_form.php';
            </script>";
    }
}
?>
