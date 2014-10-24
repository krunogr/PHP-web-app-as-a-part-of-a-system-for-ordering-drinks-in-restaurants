<?php
session_start();
include_once './includes/mySQLConnection.php';
if (isset($_SESSION['logged_in_user']) or isset($_SESSION['logged_in_admin'])) {
    session_destroy();
} else {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) or empty($password)) {
            $error = "All fields are required!";
        } else {
            $query = $pdo->prepare("SELECT * FROM mnarudzbe_korisnici WHERE user=? AND password=?");
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();
            $num = $query->rowCount();
            if ($num == 1) {
                if ($query->fetchColumn(3) == 'admin') {
                    $_SESSION['logged_in_admin'] = true;
                    header('Location: ./admin/usersReview.php');
                } else {
                    $_SESSION['logged_in_user'] = true;
                    header('Location: ./user/index.php');
                }
            } else {
                $error = "Incorrect username or password!";
            }
        }
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css"  href="assets/style.css">
        <title></title>
    </head>
    <body style='padding-top: 200px;'>
        <div class="container">
            <?php if (isset($error)) { ?>
                <small style="color: #CC0000">
                    <?php echo $error; ?>
                </small>
            <?php } ?>


            <form action="index.php" method="post">
                <input type="text" name="username" placeholder="Username"/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="submit" value="Login"/>
            </form>
        </div>
    </body>
</html>
