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
            <form action="addNewUser.php" method="post">
            <table border="1" align="center">
                <tr style="height:50px">
                    <td colspan="2">
                        Add a new user
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
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="text" name="password" placeholder="Password"/>
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
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Email"/>
                    </td>
                </tr>
                  <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Name"/>
                    </td>
                </tr>
                  <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Address"/>
                    </td>
                </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Add user"/>
                        </td>
                        
                    </tr>
            </table> 
                
                <?php 
                $notification;
                if(!empty($_POST['username']) && !empty($_POST['password']) && 
                        !empty($_POST['skupina']) && !empty($_POST['email']) && !empty($_POST['name'])
                        && !empty($_POST['address']))
                {
                    global $pdo;
                    $query->$pdo->prepare("INSERT INTO mnarudzbe_korisnici (user, password, vrsta, email, naziv, adresa) VALUES (?, ?, ?, ?, ?, ?)");
                    $query->bindValue(1, $_POST['username']);
                    $query->bindValue(2, $_POST['password']);
                    $query->bindValue(3, $_POST['skupina']);
                    $query->bindValue(4, $_POST['email']);
                    $query->bindValue(5, $_POST['name']);
                    $query->bindValue(6, $_POST['address']);
                    
                    $notification="User is added!";
                }
                else{
                     $notification="All fields are required!";
                }
                ?>
                   </form>
            <small style='color: red; font-family: Arial;'><?php echo $notification?></small>

         
        </div>
    </body>
</html>

<?php } else{
    
    header('Location:../index.php');
    
}
?>