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
            <form action="addArticle.php" method="post">
            <table align="center">
                <tr style="height:50px">
                    <td colspan="2"  style="text-align: center; font-weight: bold; font-size: 15px">
                        ADD A NEW ARTICLE
                    </td> 
                </tr>
                <tr>
                    <td>
                        Name of article
                    </td>
                    <td>
                        <input type="text" name="name_of_article" placeholder="Name of article" required="true"/>
                    </td>
                </tr>
                <tr>
                    <td>Type of article</td>
                    <td>
                        <select name="type" required="true" site="50">
                        <option selected="selected" value="Bezalkoloholna pica">Bezalkoloholna pica</option>
                        <option value="Topli napici">Topli napici</option>
                        <option value="Zestoka pica">Zestoka pica</option>
                        <option value="Topli napici">Topli napici</option>
                        </select>
                    </td>
                    </tr>
                  <tr>
                    <td>
                        Price of article
                    </td>
                    <td>
                        <input type="text" name="price_of_article" placeholder="Price of article" required="true"/>
                    </td>
                </tr>
                    <tr>
                         <td colspan="2" style="text-align: center">
                            <input type="submit" value="Add article" style="margin-top: 20px; margin-bottom: 20px; "/>
                        </td>
                        
                    </tr>
            </table> 
                
                <?php 
                $notification="";
                if(isset($_POST['name_of_article']))
                {
                    global $pdo;
                    $query=$pdo->prepare("INSERT INTO mnarudzbe_".$_SESSION['logged_in_user']."_artikli (Naziv_Artikla, Skupina_Artikla, Cijena_Artikla) VALUES (?, ?, ?)");
                    $query->bindValue(1, $_POST['name_of_article']);
                    $query->bindValue(2, $_POST['type']);
                    $query->bindValue(3, $_POST['price_of_article']);
                    $query->execute();
                    
                    $notification="Article is added!";
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