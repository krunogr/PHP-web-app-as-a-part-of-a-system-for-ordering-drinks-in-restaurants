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
            <form action="addEvent.php" method="post">
            <table align="center">
                <tr style="height:50px">
                    <td colspan="2"  style="text-align: center; font-weight: bold; font-size: 15px">
                        ADD EVENT
                    </td> 
                </tr>
                <tr>
                    <td>
                       Name of event
                    </td>
                    <td>
                        <input type="text" name="name_of_event" placeholder="Name of event" required="true"/>
                    </td>
                </tr>
                  <tr>
                    <td>
                        Place of event
                    </td>
                    <td>
                        <input type="text" name="place_of_event" placeholder="Place of event" required="true"/>
                    </td>
                </tr>
               
                  <tr>
                    <td>
                        Date of event
                    </td>
                    <td>
                        <input type="text" name="date_of_event" placeholder="dd.MM.yyyy hh.mm.ss"  required="true"/>
                    </td>
                </tr>
                  <tr>
                    <td>
                        Description of event
                    </td>
                    <td>
                        <textarea size="50" name="description_of_event" placeholder="Description of event"  required="true"   style="width: 173px"></textarea>
                    </td>
                </tr>
                <tr>
                         <td colspan="2" style="text-align: center">
                            <input type="submit" value="Submit" style="margin-top: 20px; margin-bottom: 20px; "/>
                        </td>
                        
                    </tr>
            </table> 
                
                <?php 
                $notification="";
                if(isset($_POST['name_of_event']))
                {
                    global $pdo;
                    $query=$pdo->prepare("UPDATE mnarudzbe_eventi SET mjesto=?, datum_eventa=?, naziv=?, opis_eventa=? WHERE korisnik=?");
                    $query->bindValue(1, $_POST['place_of_event']);
                    $query->bindValue(2, $_POST['date_of_event']);
                    $query->bindValue(3, $_POST['name_of_event']);
                    $query->bindValue(4, $_POST['description_of_event']);
                    $query->bindValue(5, $_SESSION['logged_in_user']);
                    $query->execute();
                    
                    $notification="Event is added!";
                }
             
                ?>
                 <small style='margin-left: 325px; color: red; font-family: Arial; font-size: 15px'><?php echo $notification?></small>
                   </form>
           

         
        </div>
    </body>
</html>

<?php } else{
    
    header('Location:../index.php');
    
}
?>