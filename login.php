<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    include('conn.php');

    if (isset($_POST['btn'])) {
        $un = $_POST['uname'];
        $ps = $_POST['pass'];

        $sql = "SELECT * FROM users WHERE uname = '$un' AND pass = '$ps'";
        $q = mysqli_query($conn, $sql);

        if (mysqli_num_rows($q) == 1) {
            $_SESSION['user'] = mysqli_fetch_assoc($q)['id'];
            header('Location: index.php');
        } else {
            echo 'Login error';
        }
    }

    ?>

    <div class=" container mt-5">
        <h1 class="text-center mb-3">Login Users</h1>
        <form action="" method="post">
            <input type="text" name="uname" placeholder="Username" class="form-control">
            <br>
            <input type="password" name="pass" placeholder="Password" class="form-control">
            <br>
            <input type="submit" value="Login" name="btn" class="btn btn-primary">

        </form>


    </div>




</body>

</html>