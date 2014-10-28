<?php
session_start();

include_once '../includes/mySQLConnection.php';
if (isset($_SESSION['logged_in_user'])) {
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" type="text/css"  href="../assets/style.css">
        </head>
        <body>
            <div class="navigation" style="padding-top: 10px;">
                <p style="font-weight: bold; ">Orders</p>
                <a href="newOrders.php">New Orders</a><br><br>
                <a href="ordersReview.php">Orders review</a><br><br>
                <p style="font-weight: bold; ">Articles</p>
                <a href="articlesReview.php">Article review</a><br><br>
                <a href="addArticle.php">Add new article</a><br><br>
                <a href="deleteArticle.php">Remove article</a><br><br>
                <p style="font-weight: bold; ">Other</p>
                <a href="addEvent.php">Add event</a><br><br>
                <a href="../logout.php">Logout</a>
            </div>
            <div class="admin_container">
                <form action="deleteArticle.php" method="post">
                    <table align="center">
                        <tr style="height:50px">
                            <td colspan="2"  style="text-align: center; font-weight: bold; font-size: 15px">
                                REMOVE ARTICLE
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                ID of article
                            </td>
                            <td>
                                <input type="text" name="id" placeholder="ID of article" required="true"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <input type="submit" value="Remove article" style="margin-top: 20px; margin-bottom: 20px; "/>
                            </td>
                        </tr>
                    </table> 
                    <?php
                    $notification;
                    if (!empty($_POST['id'])) {
                        global $pdo;
                        $query = $pdo->prepare("DELETE FROM mnarudzbe_" . $_SESSION['logged_in_user'] . "_artikli WHERE ID_Artikla=?");
                        $query->bindValue(1, $_POST['id']);
                        $query->execute();
                        $notification = "Article is removed!";
                    } else {
                        $notification = "";
                    }
                    ?>
                </form>
                <small style='margin-left: 340px; color: red; font-family: Arial; font-size: 15px'><?php echo $notification ?></small>
            </div>
        </body>
    </html>
<?php
} else {
    header('Location:../index.php');
}
?>