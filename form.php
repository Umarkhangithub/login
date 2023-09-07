<?php
include('db.php');


if (isset($_POST["submit"])) {
    $username = $_POST["Username"];
    $password = $_POST["password"];
    $message = "login in {$username} succesfully";

    $errors = array();
    if (empty($username) || empty($password)) {
        $errors[] = "All field must be field";
    }

    # here we are going to display error
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "{$error} . <br>";
        }
    }
}

if (empty($errors)) {

    $query = "INSERT INTO log VALUES('$username','$password')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "";
    } else {
        die("Database query Failed...!" . mysqli_error($connection));
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="index.css" rel="stylesheet">
 </head>

<body>
    <div class="wrapper">
        <form action=" " method="post">
            <h1>Login</h1><br>
            <div class="input_box">
                <input type="text" name="Username" placeholder="Username" value="<?php echo htmlspecialchars($Username) ?>">
            </div>
            <div class="input_box">
                <input type="password" name="password" id="" placeholder="password" value="">
            </div>
            <div class="remember_forgot">
                <label for=""> <input type="checkbox" name="" id="">Remember me</label>
                <a href="#">forgot password</a>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="submit">
            </div>
            <div class="register_link">
                <p>Don't have an account?</p><a href="#">Register</a>
            </div>
            <div class="mes">
                <?php $message; ?>
            </div>

        </form>
    </div>
    <?php



    ?>

</body>

</html>