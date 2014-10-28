<?php

class Orders {

    public function fetch() {
        global $pdo;
        if (!empty($_POST['id'])) {
             global $pdo;
            $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_SESSION["logged_in_user"] . "_narudzbe" .
                    " WHERE ID_Narudzbe=?");
            $query->bindValue(1, $_POST['id']);
        } else {
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_SESSION["logged_in_user"] . "_narudzbe");
        }
        $query->execute();
    return $query->fetchAll();
    }
}
?>
<table style="border-collapse: collapse; text-align: center" border="1" align="center">
    <tr style="font-weight: bold">
        <td>ID order</td>
        <td>Order</td>
        <td>ID place</td>
        <td>Total</td>
        <td>Time of ordering</td>
        <td>Time of serving</td>
    </tr>

<?php
$orders = (new Orders())->fetch();
foreach ($orders as $order) {
    ?>
        <tr>
            <td><?php echo $order['ID_Narudzbe'] ?></td>
            <td width="250px"><?php echo $order['Narudzba'] ?></td>
            <td><?php echo $order['ID_Mjesta'] ?></td>
            <td><?php echo $order['Racun_Narudzbe'] ?></td>
            <td><?php echo $order['Vrijeme_zaprimanja_narudzbe'] ?></td>
            <td><?php echo $order['Vrijeme_posluzivanja'] ?></td>
        </tr>

<?php }
?>
</table>