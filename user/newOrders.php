<?php

session_start();

include_once '../includes/mySQLConnection.php';
if(isset($_SESSION['logged_in_user'])){
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css"  href="../assets/style.css">
    </head>
    <body>
        <div class="navigation" style="padding-top: 10px;">
                <p style="font-weight: bold; ">Orders</p>
                <a href="newOrders.php">New Orders<a><br><br>
                <a href="ordersReview.php">Orders review<a><br><br>
                <p style="font-weight: bold; ">Articles</p>
                <a href="articlesReview.php">Article review<a><br><br>
                <a href="addArticle.php">Add new article<a><br><br>
                <a href="deleteArticle.php">Remove article<a><br><br>
                <p style="font-weight: bold; ">Other</p>
                <a href="addEvent.php">Add event<a><br><br>
                        <a href="../logout.php">Logout<a>
        </div>
        <div class="admin_container">
            <form action="newOrders.php" method="post">
            <table align="center">
                <tr style="height:50px">
                    <td colspan="3"  style="text-align: center; font-weight: bold; font-size: 15px">
                        NEW ORDERS
                    </td> 
                </tr>
                <tr>
                         <td colspan="2" style="text-align: center">
                            <input type="submit" value="Serve the order" style="margin-top: 20px; margin-bottom: 20px; "/>
                        </td>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" value="Refresh the list" style="margin-top: 20px; margin-bottom: 20px; "/>
                        </td>
                        
                    </tr>
            </table> 
                
               <?php 
                        $notification="";
                        include_once '../includes/getOrdersNewUser.php';
                     
                ?>
         <small style='margin-left: 200px; color: red; font-family: Arial; font-size: 15px'><?php echo $notification?></small>
                   </form>
           

         
        </div>
    </body>
</html>

<?php } else{
    
    header('Location:../index.php');
    
}
?>