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
                <form action="articlesReview.php" method="post">
                    <table align="center">
                        <tr style="height:50px">
                            <td colspan="2"  style="text-align: center; font-weight: bold; font-size: 15px">
                                ARTICLES REVIEW
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                ID of article
                            </td>
                            <td>
                                <input type="text" name="id_of_article" placeholder="ID of article"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name of article
                            </td>
                            <td>
                                <input type="text" name="name_of_article" placeholder="Name of article"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <input type="submit" value="Search" style="margin-top: 20px; margin-bottom: 20px; "/>
                            </td>

                        </tr>
                    </table> 
                    <?php
                    $notification = "";
                    if (isset($_POST['id_of_article'])) { {
                            if (!empty($_POST['id_of_article']) || !empty($_POST['name_of_article'])) {
                                include_once '../includes/getArticles.php';
                            } else {
                                $notification = "Insert id or name of article!";
                            }
                        }
                    }
                    ?>
                    <small style='margin-left: 300px; color: red; font-family: Arial; font-size: 15px'><?php echo $notification ?></small>
                </form></div>
        </body>
    </html>
<?php
} else {
    header('Location:../index.php');
}
?>