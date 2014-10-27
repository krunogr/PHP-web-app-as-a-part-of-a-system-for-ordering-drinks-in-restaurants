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
            <form action="ordersReview.php" method="post">
            <table align="center">
                <tr style="height:50px">
                    <td colspan="2"  style="text-align: center; font-weight: bold; font-size: 15px">
                        NEW ORDERS
                    </td> 
                </tr>
                <tr>
                    <td>
                        User
                    </td>
                    <td>
                        <input type="text" name="user" placeholder="User" required="true"/>
                    </td>
                </tr>
                  <tr>
                    <td>
                        Date of
                    </td>
                    <td>
                        <input type="text" name="date_of" placeholder="dd.MM.yyyy hh.mm.ss"/>
                    </td>
                </tr>
               
                  <tr>
                    <td>
                        Date to
                    </td>
                    <td>
                        <input type="text" name="date_to" placeholder="dd.MM.yyyy hh.mm.ss"/>
                    </td>
                </tr>
                <tr>
                         <td colspan="2" style="text-align: center">
                            <input type="submit" value="Search" style="margin-top: 20px; margin-bottom: 20px; "/>
                        </td>
                        
                    </tr>
            </table> 
                
               <?php 
                        $notification="";
                        if(isset($_POST['user'])){
                        if(((!empty($_POST['user']) && empty($_POST['date_of']) &&
                             empty($_POST['date_to']))|| (!empty($_POST['user']) && !empty($_POST['date_of']) &&
                             !empty($_POST['date_to']))))
                          {
                                include_once '../includes/getOrders.php';
                          }
                          else{
                                 $notification = "Please, insert only username or username, date of and date to!";
                          }
               }
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