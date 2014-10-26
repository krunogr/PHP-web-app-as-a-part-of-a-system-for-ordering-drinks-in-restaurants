<?php

class Orders {

    public function fetch() {
        $notification = "";
        if (isset($_POST['user'])) {
            if (empty($_POST['user']) && empty($_POST['date_of']) &&
                    empty($_POST['date_to'])) {
                $notification = "For searching put some information!";
            } else {
                if (!empty($_POST['user']) && empty($_POST['date_of']) &&
                        empty($_POST['date_to'])) {
                    global $pdo;
                    $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_POST["user"] . "_narudzbe");
                    $query->execute();
                    $notification = "";
                } elseif (!empty($_POST['user']) && !empty($_POST['date_of']) &&
                        !empty($_POST['date_to'])) {
                    global $pdo;
                    $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_POST["user"] . "_narudzbe" . "WHERE
                        Vrijeme_zaprimanja_narudzbe > " . $_POST["date_of"] .
                            " AND Vrijeme_zaprimanja_narudzbe < " . $_POST["date_to"]);

                    $query->execute();
                    $notification = "";
                }
                return $query->fetchAll();
            }
        }
    }

}
?>
<table style="border: black solid 1px" align="center">
    <tr style="font-weight: bold">
        <td>ID order</td>
        <td>Order</td>
        <td>ID place</td>
        <td>Total</td>
        <td>Time</td>
    </tr>

    <?php
    $orders = (new Orders())->fetch();
    print_r($orders);
    foreach ($orders as $order) {
        ?>
        <tr>
            <td><?php echo $order['ID_Narudzbe'] ?></td>
            <td width="250px"><?php echo $order['Narudzba'] ?></td>
            <td><?php echo $order['ID_Mjesta'] ?></td>
            <td><?php echo $order['Racun_Narudzbe'] ?></td>
            <td><?php echo $order['Vrijeme_zaprimanja_narudzbe'] ?></td>
        </tr>

    <?php }
    ?>

</table>