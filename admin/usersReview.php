<?php

session_start();

include_once '../includes/mySQLConnection.php';
if(isset($_SESSION['logged_in_admin'])){
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css"  href="../assets/style.css">
    </head>
    <body>
         <div class="navigation">
                <a href="usersReview.php">Users review<a><br><br>
                <a href="addNewUser.php">Add new user<a><br><br>
                <a href="deleteUser.php">Delete user<a><br><br>
                <a href="ordersReview.php">Orders review<a><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="../logout.php">Logout<a>
        </div>
        <div class="admin_container">
            <form action="usersReview.php" method="get">
            <table border="1" align="center">
                <tr style="height:50px">
                    <td colspan="2">
                        Users review
                    </td> 
                </tr>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Username"/>
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select name="skupina">
                        <option selected="selected" value="">--</option>
                        <option value="korisnik">User</option>
                        <option value="admin">Admin</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Search"/>
                        </td>
                        
                    </tr>
            </table> 
                
                <?php if(isset($_GET['skupina']))
                {
                    include_once '../includes/getUsers.php';
                }
                ?>
                   </form>

         
        </div>
    </body>
</html>

<?php } else{
    
    header('Location:../index.php');
    
}
?>