<?php
session_start();

include_once '../includes/mySQLConnection.php';
if (isset($_SESSION['logged_in_admin'])) {
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" type="text/css"  href="../assets/style.css">
        </head>
        <body>
            <div class="navigation">
                <a href="usersReview.php">Users review</a><br><br>
                <a href="addNewUser.php">Add new user</a><br><br>
                <a href="deleteUser.php">Delete user</a><br><br>
                <a href="ordersReview.php">Orders review</a><br><br><br><br><br><br><br><br><br><br><br><br>
                <a href="../logout.php">Logout</a>
            </div>
            <div class="admin_container">
                <form action="deleteUser.php" method="post">
                    <table align="center">
                        <tr style="height:50px">
                            <td colspan="2"  style="text-align: center; font-weight: bold; font-size: 15px">
                                REMOVE USER
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                Username
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Username" required="true"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <input type="submit" value="Remove user" style="margin-top: 20px; margin-bottom: 20px; "/>
                            </td>
                        </tr>
                    </table> 
                    <?php
                    $notification;
                    if (!empty($_POST['username'])) {
                        global $pdo;
                        $query = $pdo->prepare("DELETE FROM mnarudzbe_korisnici WHERE user=?");
                        $query->bindValue(1, $_POST['username']);
                        $query->execute();

                        $notification = "User is removed!";
                    } else {
                        $notification = "";
                    }
                    ?>
                </form>
                <small style='margin-left: 345px; color: red; font-family: Arial; font-size: 15px'><?php echo $notification ?></small>
            </div>
        </body>
    </html>
    <?php
} else {
    header('Location:../index.php');
}
?>