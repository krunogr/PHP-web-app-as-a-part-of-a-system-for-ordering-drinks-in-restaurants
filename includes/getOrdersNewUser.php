<?php

class Orders {

    public function fetch() {
        global $pdo;
        global $pdo;
        if (isset($_POST['select'])) {
            if (!empty($_POST['select'])) {
                $t = date('d.m.Y H.i.s', time());
                $query = $pdo->prepare("UPDATE" . " mnarudzbe_" . $_SESSION["logged_in_user"] . "_narudzbe SET Vrijeme_posluzivanja= ? 
                        WHERE ID_Narudzbe= ?");
                $query->bindValue(1, $t);
                $query->bindValue(2, $_POST['select']);
                $query->execute();
            }
        }
        $query = $pdo->prepare("SELECT * FROM " . "mnarudzbe_" . $_SESSION["logged_in_user"] . "_narudzbe" .
                " WHERE Vrijeme_posluzivanja  LIKE '%NIJE%'");
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
        <td>Choose</td>
    </tr>

    <?php
    $orders = (new Orders())->fetch();
    foreach ($orders as $order) {
        ?>
        <tr>
            <td><?php echo $order['ID_Narudzbe'] ?></td>
            <td width="350px"><?php echo $order['Narudzba'] ?></td>
            <td><?php echo $order['ID_Mjesta'] ?></td>
            <td><?php echo $order['Racun_Narudzbe'] ?></td>
            <td><?php echo $order['Vrijeme_zaprimanja_narudzbe'] ?></td>
            <td> <input type="radio" id="ID_Narudzbe" name="select" value="<?php echo $order['ID_Narudzbe'] ?>"></input></td>
        </tr>

    <?php }
    ?>
</table>