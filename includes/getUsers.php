<?php

class Users {

    public function fetch() {
        global $pdo;
        if (empty($_GET['skupina']) && empty($_GET['username'])) {
            $query = $pdo->prepare("SELECT ID_korisnika, user, vrsta, email, naziv, adresa FROM mnarudzbe_korisnici");
        } elseif (!empty($_GET['skupina']) && !empty($_GET['username'])) {
            $query = $pdo->prepare("SELECT ID_korisnika, user, vrsta, email, naziv, adresa FROM mnarudzbe_korisnici WHERE user=? AND vrsta=?");
            $query->bindValue(1, $_GET['username']);
            $query->bindValue(2, $_GET['skupina']);
        } elseif (empty($_GET['skupina']) && !empty($_GET['username'])) {
            $query = $pdo->prepare("SELECT ID_korisnika, user, vrsta, email, naziv, adresa FROM mnarudzbe_korisnici WHERE user=?");
            $query->bindValue(1, $_GET['username']);
        } elseif (!empty($_GET['skupina']) && empty($_GET['username'])) {
            $query = $pdo->prepare("SELECT ID_korisnika, user, vrsta, email, naziv, adresa FROM mnarudzbe_korisnici WHERE vrsta=?");
            $query->bindValue(1, $_GET['skupina']);
        }
        $query->execute();
        return $query->fetchAll();
    }

}

$users = (new Users)->fetch();
if (count($users)) {
    ?>
    <table style="border-collapse: collapse; text-align: center" border="1" align="center">
        <tr style="font-weight: bold">
            <td>user ID</td>
            <td>username</td>
            <td>type</td>
            <td>e-mail</td>
            <td>name</td>
            <td>address</td>
        </tr>
    <?php
    foreach ($users as $user) {
        ?>
            <tr>
                <td><?php echo $user['ID_korisnika'] ?></td>
                <td><?php echo $user['user'] ?></td>
                <td><?php echo $user['vrsta'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['naziv'] ?></td>
                <td><?php echo $user['adresa'] ?></td>
            </tr>

    <?php }
    ?>
    </table>
    <?php
} else {
    $notification = "No users for inputed data";
}
?>