<?php

class Orders {

    public function fetch() {
        if (!empty($_POST['user']) && empty($_POST['date_of']) &&
                empty($_POST['date_to'])) {
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_POST["user"] . "_narudzbe");
            $query->execute();
            return $query->fetchAll();
        } elseif (!empty($_POST['user']) && !empty($_POST['date_of']) &&
                !empty($_POST['date_to'])) {
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_POST["user"] . "_narudzbe" .
                    " WHERE Vrijeme_zaprimanja_narudzbe BETWEEN '" . $_POST["date_of"] .
                    "' AND '" . $_POST["date_to"] . "'");
            $query->execute();
            return $query->fetchAll();
        }
    }

}

$orders = (new Orders())->fetch();
if (count($orders) > 0) {
    ?>
    <table style="border-collapse: collapse; text-align: center" border="1" align="center">
        <tr style="font-weight: bold">
            <td>ID order</td>
            <td>Order</td>
            <td>ID place</td>
            <td>Total</td>
            <td>Time</td>
        </tr>
    <?php
    foreach ($orders as $order) {
        ?>
            <tr>
                <td ><?php echo $order['ID_Narudzbe'] ?></td>
                <td width="350px"><?php echo $order['Narudzba'] ?></td>
                <td><?php echo $order['ID_Mjesta'] ?></td>
                <td><?php echo $order['Racun_Narudzbe'] ?></td>
                <td><?php echo $order['Vrijeme_zaprimanja_narudzbe'] ?></td>
            </tr>
    <?php }
    ?>
    </table>
<?php
} else {
    $notification = "No orders for inputed data";
}
?>